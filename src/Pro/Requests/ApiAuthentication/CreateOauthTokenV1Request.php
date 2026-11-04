<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use Carbon\CarbonImmutable;
use Saloon\Contracts\Authenticator;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Auth\NullAuthenticator;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;
use spkm\Jamf\Auth\TokenRequest;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Pro\Data\OAuthTokenResponse;
use spkm\Jamf\Requests\JamfRequest;

/**
 * Obtain an access token using an API Client: POST /v1/oauth/token.
 *
 * Signs in with an API client's id and secret (the OAuth 2 client credentials grant). The connector sends this
 * itself when it is configured with an API client, so you rarely need it.
 */
class CreateOauthTokenV1Request extends JamfRequest implements HasBody, TokenRequest
{
    use HasFormBody;

    protected Method $method = Method::POST;

    protected string $responseShape = self::ONE;

    protected ?string $dto = OAuthTokenResponse::class;

    protected bool $safe = false;

    public function __construct(protected string $clientId, #[\SensitiveParameter] protected string $clientSecret) {}

    public function resolveEndpoint(): string
    {
        return '/v1/oauth/token';
    }

    protected function defaultAuth(): Authenticator
    {
        return new NullAuthenticator;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        return [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];
    }

    public function tokenFrom(Response $response): array
    {
        $body = $response->json();
        $token = $body['access_token'] ?? null;
        $lifetime = is_numeric($body['expires_in'] ?? null) ? (int) $body['expires_in'] : 60;

        if (! is_string($token) || $token === '') {
            throw new ServerErrorException($response);
        }

        return ['token' => $token, 'expires_at' => CarbonImmutable::now()->addSeconds($lifetime)->getTimestamp()];
    }

    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['clientId' => $this->clientId, 'clientSecret' => '[redacted]'];
    }
}
