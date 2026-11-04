<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use spkm\Jamf\Pro\Data\OidcDirectIdpLoginSkipUrl;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the URL to directly login to the IdP: GET /v1/oidc/direct-idp-login-url.
 */
class GetOidcDirectIdpLoginUrlV1Request extends GetRequest
{
    protected ?string $dto = OidcDirectIdpLoginSkipUrl::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/oidc/direct-idp-login-url';
    }
}
