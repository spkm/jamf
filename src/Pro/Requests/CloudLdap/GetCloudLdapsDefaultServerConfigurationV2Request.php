<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\CloudLdapServerResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get default server configuration: GET /v2/cloud-ldaps/defaults/{provider}/server-configuration.
 */
class GetCloudLdapsDefaultServerConfigurationV2Request extends GetRequest
{
    protected ?string $dto = CloudLdapServerResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $provider, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/defaults/'.Path::segment((string) $this->provider).'/server-configuration';
    }
}
