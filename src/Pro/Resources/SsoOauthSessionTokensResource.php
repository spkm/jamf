<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\OauthTokens;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SsoOauthSessionTokens\GetOauth2SessionTokensV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The sso-oauth-session-tokens endpoints of the Jamf Pro API, from Jamf::ssoOauthSessionTokens().
 *
 * @extends BaseResource<Data>
 */
class SsoOauthSessionTokensResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve the access token and user information for the current session: GET /v1/oauth2/session-tokens.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getOauth2SessionTokensV1(array $options = []): ?OauthTokens
    {
        return $this->fetch(new GetOauth2SessionTokensV1Request($options));
    }
}
