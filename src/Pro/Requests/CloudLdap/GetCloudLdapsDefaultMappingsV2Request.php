<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\CloudLdapMappingsResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get default mappings: GET /v2/cloud-ldaps/defaults/{provider}/mappings.
 */
class GetCloudLdapsDefaultMappingsV2Request extends GetRequest
{
    protected ?string $dto = CloudLdapMappingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $provider, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/defaults/'.Path::segment((string) $this->provider).'/mappings';
    }
}
