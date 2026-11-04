<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Pro\Data\OidcBrokerConfig;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the OIDC broker configuration: GET /v3/sso/oidc-broker-config.
 *
 * Returns the tenant's currently selected OIDC broker configuration from the remote authentication service. Secret
 * fields are never included in the response.
 */
class GetSsoOidcBrokerConfigV3Request extends GetRequest
{
    protected ?string $dto = OidcBrokerConfig::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/sso/oidc-broker-config';
    }
}
