<?php

namespace spkm\Jamf;

use DateTimeImmutable;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use LogicException;
use Psr\Http\Message\RequestInterface;
use Saloon\Config;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Auth\AccessTokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\HasTimeout;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Auth\TokenRequest;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Support\QueryString;

/**
 * What a connection to either of Jamf's APIs shares: the credentials, a bearer token fetched before the first
 * request (from the cache, encrypted, when one is there) and again when it is about to expire or Jamf refuses it,
 * timeouts and retries from config, and Jamf's way of writing a query string.
 */
abstract class JamfConnector extends Connector
{
    use HasTimeout;

    /**
     * How long before a token expires the connector fetches a new one, at most.
     */
    public const REFRESH_MARGIN = 60;

    protected float $connectTimeout;

    protected float $requestTimeout;

    /**
     * When the token held should be replaced (a Unix timestamp), or null when none is held.
     */
    protected ?int $refreshAt = null;

    public function __construct(protected Credentials $credentials)
    {
        $this->connectTimeout = self::timeout(config('jamf.timeouts.connect'), Config::$defaultConnectionTimeout);
        $this->requestTimeout = self::timeout(config('jamf.timeouts.request'), Config::$defaultRequestTimeout);

        if (config('jamf.retries.times')) {
            $this->tries = (int) config('jamf.retries.times');
            $this->retryInterval = (int) config('jamf.retries.interval_ms', 500);
            $this->useExponentialBackoff = true;
            $this->throwOnMaxTries = false;
        }
    }

    /**
     * The server's address as configured, such as https://yourschool.jamfcloud.com: the root of Jamf's own pages,
     * for a link such as baseUrl().'/mobileDevices.html?id=61'.
     */
    public function baseUrl(): string
    {
        return rtrim($this->credentials->baseUrl, '/');
    }

    public function credentials(): Credentials
    {
        return $this->credentials;
    }

    /**
     * A fingerprint of the server and who signs in to it, so that what one account fetched is never served to
     * another (the response cache keys on it) without the credentials being written anywhere.
     */
    public function credentialsFingerprint(): string
    {
        return hash('sha256', $this->baseUrl().'|'.$this->credentials->identity());
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        $this->ensureAuthenticated($request);

        $response = parent::send($request, $mockClient, $handleRetry);

        if ($response->status() === 401 && config('jamf.reauthenticate', true) && ! $request instanceof TokenRequest) {
            $this->forgetToken();
            $this->ensureAuthenticated($request);

            return parent::send($request, $mockClient, $handleRetry);
        }

        return $response;
    }

    public function sendAsync(Request $request, ?MockClient $mockClient = null): PromiseInterface
    {
        $this->ensureAuthenticated($request);

        return parent::sendAsync($request, $mockClient);
    }

    /**
     * Forget the token: the one this connector holds and the cached one, so the next request fetches a new one.
     */
    public function forgetToken(): void
    {
        Cache::forget($this->tokenCacheKey());
        $this->authenticator = null;
        $this->refreshAt = null;
    }

    /**
     * Holds a valid token before a request that needs one: the cached one, or a new one from Jamf. Building a
     * connector never contacts Jamf.
     */
    protected function ensureAuthenticated(Request $request): void
    {
        if ($request instanceof TokenRequest) {
            return;
        }

        if ($this->getAuthenticator() === null || $this->refreshAt === null || $this->refreshAt <= Carbon::now()->getTimestamp()) {
            $token = $this->cachedToken() ?? $this->fetchToken();
            $this->authenticate(new AccessTokenAuthenticator($token['token'], null, new DateTimeImmutable('@'.$token['expires_at'])));
            $this->refreshAt = $token['refresh_at'];
        }
    }

    /**
     * The token in the cache for this server and account, when there is one with time left.
     *
     * @return array{token: string, expires_at: int, refresh_at: int}|null
     */
    private function cachedToken(): ?array
    {
        $cached = Cache::get($this->tokenCacheKey());

        if (! is_string($cached)) {
            return null;
        }

        try {
            $token = json_decode(Crypt::decryptString($cached), true, flags: JSON_THROW_ON_ERROR);
        } catch (DecryptException|JsonException) {
            return null;
        }

        if (! is_array($token) || ! is_string($token['token'] ?? null) || ! is_int($token['expires_at'] ?? null) || ! is_int($token['refresh_at'] ?? null)) {
            return null;
        }

        return $token['refresh_at'] > Carbon::now()->getTimestamp() ? $token : null;
    }

    /**
     * A new token from Jamf, cached (encrypted) until it is due to be replaced. It is replaced a minute before it
     * expires, or halfway through its life when that is shorter.
     *
     * @return array{token: string, expires_at: int, refresh_at: int}
     */
    private function fetchToken(): array
    {
        $request = $this->credentials->tokenRequest();

        try {
            $response = $this->tokenConnector()->send($request);
        } catch (RequestException $exception) {
            throw JamfApiException::fromResponse($exception->getResponse());
        }

        if (! $response->successful()) {
            throw JamfApiException::fromResponse($response);
        }

        $token = $request->tokenFrom($response);
        $now = Carbon::now()->getTimestamp();
        $lifetime = max(0, $token['expires_at'] - $now);
        $token['refresh_at'] = $token['expires_at'] - min(self::REFRESH_MARGIN, intdiv($lifetime, 2));

        if ($token['refresh_at'] > $now) {
            Cache::put($this->tokenCacheKey(), Crypt::encryptString(json_encode($token, JSON_THROW_ON_ERROR)), Carbon::createFromTimestamp($token['refresh_at']));
        }

        return $token;
    }

    /**
     * The connector that sends the token request: one to the Jamf Pro API, where Jamf issues tokens.
     */
    abstract protected function tokenConnector(): Connector;

    /**
     * The token's cache key: one per server and account, hashed so neither appears in the cache. The Jamf Pro and
     * Classic connectors for a server share it.
     */
    private function tokenCacheKey(): string
    {
        return 'jamf.token.'.sha1($this->baseUrl().'|'.$this->credentials->identity());
    }

    /**
     * Writes the query string as Jamf reads it: a parameter with several values repeated
     * (section=GENERAL&section=HARDWARE), rather than PHP's section[0]=GENERAL.
     */
    public function handlePsrRequest(RequestInterface $request, PendingRequest $pendingRequest): RequestInterface
    {
        $uri = $request->getUri();
        $existing = QueryString::parse((string) parse_url($pendingRequest->getUrl(), PHP_URL_QUERY));

        return $request->withUri($uri->withQuery(QueryString::encode([...$existing, ...$pendingRequest->query()->all()])));
    }

    /**
     * Retry only a request that changes nothing, and only for a fault on Jamf's side or the way there.
     */
    public function handleRetry(FatalRequestException|RequestException $exception, Request $request): bool
    {
        $isSafe = $request instanceof JamfRequest ? $request->isSafe() : $request->getMethod() === Method::GET;

        if (! $isSafe) {
            return false;
        }

        return $exception instanceof FatalRequestException
            || in_array($exception->getResponse()->status(), [408, 429], true)
            || $exception->getResponse()->serverError();
    }

    /**
     * A timeout from config: seconds, or the default when the value is empty or not positive (a zero would mean
     * waiting forever).
     */
    private static function timeout(mixed $value, float $default): float
    {
        return is_numeric($value) && (float) $value > 0 ? (float) $value : $default;
    }

    /**
     * What a dump shows: the server and who signs in, never a secret or the token.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['baseUrl' => $this->baseUrl(), 'identity' => $this->credentials->identity(), 'token' => $this->getAuthenticator() === null ? null : '[redacted]'];
    }

    /**
     * A connector holds the credentials and a token, so it is never written out with a queued job or a session;
     * build one from config where it is needed.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        throw new LogicException('A Jamf connector cannot be serialised; resolve it from the Jamf facade or config where it is used.');
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
        ];
    }
}
