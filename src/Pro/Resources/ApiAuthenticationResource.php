<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\Authorization;
use spkm\Jamf\Pro\Data\AuthorizationV1;
use spkm\Jamf\Pro\Data\AuthToken;
use spkm\Jamf\Pro\Data\AuthTokenV1;
use spkm\Jamf\Pro\Data\CurrentAuthorization;
use spkm\Jamf\Pro\Data\OAuthTokenResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthCurrentRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\GetAuthRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\GetAuthV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\InvalidateAuthTokenRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\InvalidateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\KeepAuthTokenAliveRequest;
use spkm\Jamf\Pro\Requests\ApiAuthentication\KeepAuthTokenAliveV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The api-authentication endpoints of the Jamf Pro API, from Jamf::apiAuthentication().
 *
 * @extends BaseResource<Data>
 */
class ApiAuthenticationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get the authorization details associated with the current API token: POST /auth/current.
     *
     * @deprecated Jamf deprecated this endpoint on 2020-06-01.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createAuthCurrent(array $options = []): ?CurrentAuthorization
    {
        return $this->fetch(new CreateAuthCurrentRequest($options));
    }

    /**
     * Create a token based on other authentication details (basic, etc.): POST /v1/auth/token.
     */
    public function createAuthTokenV1(string $username, #[\SensitiveParameter] string $password): ?AuthTokenV1
    {
        return $this->fetch(new CreateAuthTokenV1Request($username, $password));
    }

    /**
     * Obtain an access token using an API Client: POST /v1/oauth/token.
     */
    public function createOauthTokenV1(string $clientId, #[\SensitiveParameter] string $clientSecret): ?OAuthTokenResponse
    {
        return $this->fetch(new CreateOauthTokenV1Request($clientId, $clientSecret));
    }

    /**
     * Get all the Authorization details associated with the current api: GET /auth.
     *
     * @deprecated Jamf deprecated this endpoint on 2020-06-01.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAuth(array $options = []): ?Authorization
    {
        return $this->fetch(new GetAuthRequest($options));
    }

    /**
     * Get all the Authorization details associated with the current api: GET /v1/auth.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAuthV1(array $options = []): ?AuthorizationV1
    {
        return $this->fetch(new GetAuthV1Request($options));
    }

    /**
     * Invalidate current token: POST /auth/invalidateToken.
     *
     * @deprecated Jamf deprecated this endpoint on 2020-06-01.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function invalidateAuthToken(array $options = []): bool
    {
        return $this->perform(new InvalidateAuthTokenRequest($options));
    }

    /**
     * Invalidate current token: POST /v1/auth/invalidate-token.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function invalidateAuthTokenV1(array $options = []): bool
    {
        return $this->perform(new InvalidateAuthTokenV1Request($options));
    }

    /**
     * Invalidate existing token and generates new token: POST /auth/keepAlive.
     *
     * @deprecated Jamf deprecated this endpoint on 2020-06-01.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function keepAuthTokenAlive(array $options = []): ?AuthToken
    {
        return $this->fetch(new KeepAuthTokenAliveRequest($options));
    }

    /**
     * Invalidate existing token and generates new token: POST /v1/auth/keep-alive.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function keepAuthTokenAliveV1(array $options = []): ?AuthTokenV1
    {
        return $this->fetch(new KeepAuthTokenAliveV1Request($options));
    }
}
