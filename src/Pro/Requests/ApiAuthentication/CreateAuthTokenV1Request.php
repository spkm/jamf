<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use Carbon\CarbonImmutable;
use Carbon\Exceptions\InvalidFormatException;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Response;
use spkm\Jamf\Auth\TokenRequest;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Pro\Data\AuthTokenV1;
use spkm\Jamf\Requests\JamfRequest;

/**
 * Create a token based on other authentication details (basic, etc.): POST /v1/auth/token.
 *
 * Signs in with a Jamf Pro user account's username and password. The connector sends this itself when it is
 * configured with an account, so you rarely need it.
 */
class CreateAuthTokenV1Request extends JamfRequest implements TokenRequest
{
    protected Method $method = Method::POST;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AuthTokenV1::class;

    protected bool $safe = false;

    public function __construct(protected string $username, #[\SensitiveParameter] protected string $password) {}

    public function resolveEndpoint(): string
    {
        return '/v1/auth/token';
    }

    protected function defaultAuth(): Authenticator
    {
        return new BasicAuthenticator($this->username, $this->password);
    }

    public function tokenFrom(Response $response): array
    {
        $body = $response->json();
        $token = $body['token'] ?? null;

        try {
            $expires = is_string($body['expires'] ?? null) ? CarbonImmutable::parse($body['expires']) : null;
        } catch (InvalidFormatException) {
            $expires = null;
        }

        if (! is_string($token) || $token === '') {
            throw new ServerErrorException($response);
        }

        return ['token' => $token, 'expires_at' => ($expires ?? CarbonImmutable::now()->addMinutes(20))->getTimestamp()];
    }

    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return ['username' => $this->username, 'password' => '[redacted]'];
    }
}
