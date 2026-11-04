<?php

namespace spkm\Jamf\Pro\Requests\SsoOauthSessionTokens;

use spkm\Jamf\Pro\Data\OauthTokens;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the access token and user information for the current session: GET /v1/oauth2/session-tokens.
 */
class GetOauth2SessionTokensV1Request extends GetRequest
{
    protected ?string $dto = OauthTokens::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/oauth2/session-tokens';
    }
}
