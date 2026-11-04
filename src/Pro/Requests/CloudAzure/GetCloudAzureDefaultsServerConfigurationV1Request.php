<?php

namespace spkm\Jamf\Pro\Requests\CloudAzure;

use spkm\Jamf\Pro\Data\AzureServerConfiguration;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get default server configuration: GET /v1/cloud-azure/defaults/server-configuration.
 *
 * This is the default set of attributes that allows you to return the data you need from Azure AD. Some fields may be
 * empty and may be edited when creating a new configuration.
 */
class GetCloudAzureDefaultsServerConfigurationV1Request extends GetRequest
{
    protected ?string $dto = AzureServerConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-azure/defaults/server-configuration';
    }
}
