<?php

namespace spkm\Jamf\Pro\Requests\CloudAzure;

use spkm\Jamf\Pro\Data\AzureMappings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get default mappings: GET /v1/cloud-azure/defaults/mappings.
 *
 * This is the default set of attributes that allows you to return the data you need from Azure AD. Some fields may be
 * empty and may be edited when creating a new configuration.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-05-21.
 */
class GetCloudAzureDefaultsMappingsV1Request extends GetRequest
{
    protected ?string $dto = AzureMappings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-azure/defaults/mappings';
    }
}
