<?php

namespace spkm\Jamf\Auth;

use InvalidArgumentException;
use LogicException;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Requests\JamfRequest;

/**
 * How the package signs in to one Jamf Pro server: an API client (client id and secret), which Jamf recommends, or
 * a user account (username and password). Either gives a bearer token that works on the Jamf Pro API and the
 * Classic API alike.
 */
final readonly class Credentials
{
    private function __construct(
        public string $baseUrl,
        public ?string $clientId,
        private ?string $clientSecret,
        public ?string $username,
        private ?string $password,
    ) {
        if (trim($baseUrl) === '') {
            throw new InvalidArgumentException('Jamf credentials need the server\'s address.');
        }
    }

    /**
     * An API client, from Settings > System > API roles and clients.
     */
    public static function apiClient(string $baseUrl, string $clientId, #[\SensitiveParameter] string $clientSecret): self
    {
        if ($clientId === '' || $clientSecret === '') {
            throw new InvalidArgumentException('An API client needs a client id and a client secret.');
        }

        return new self($baseUrl, $clientId, $clientSecret, null, null);
    }

    /**
     * A Jamf Pro user account.
     */
    public static function account(string $baseUrl, string $username, #[\SensitiveParameter] string $password): self
    {
        if ($username === '' || $password === '') {
            throw new InvalidArgumentException('A Jamf account needs a username and a password.');
        }

        return new self($baseUrl, null, null, $username, $password);
    }

    public function usesApiClient(): bool
    {
        return $this->clientId !== null;
    }

    /**
     * Who signs in: the API client's id, or the account's username.
     */
    public function identity(): string
    {
        return $this->usesApiClient() ? 'client:'.$this->clientId : 'user:'.$this->username;
    }

    /**
     * The request that exchanges these credentials for a token.
     */
    public function tokenRequest(): JamfRequest&TokenRequest
    {
        return $this->usesApiClient()
            ? new CreateOauthTokenV1Request((string) $this->clientId, (string) $this->clientSecret)
            : new CreateAuthTokenV1Request((string) $this->username, (string) $this->password);
    }

    /**
     * What a dump shows: everything but the secret.
     *
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return [
            'baseUrl' => $this->baseUrl,
            'clientId' => $this->clientId,
            'clientSecret' => $this->clientSecret === null ? null : '[redacted]',
            'username' => $this->username,
            'password' => $this->password === null ? null : '[redacted]',
        ];
    }

    /**
     * Credentials are never written out with a queued job or a session; build them from config where they are
     * needed.
     *
     * @return array<string, mixed>
     */
    public function __serialize(): array
    {
        throw new LogicException('Jamf credentials cannot be serialised; resolve the connector from the Jamf facade or config where it is used.');
    }
}
