<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\CloudLdapMappingsResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get mappings configurations for Cloud Identity Providers server configuration: GET /v2/cloud-ldaps/{id}/mappings.
 *
 * Get all mappings configurations for Cloud Identity Providers server configuration.
 */
class GetCloudLdapMappingsV2Request extends GetRequest
{
    protected ?string $dto = CloudLdapMappingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/'.Path::segment((string) $this->id).'/mappings';
    }
}
