<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AzureConfiguration;
use spkm\Jamf\Pro\Data\AzureMappings;
use spkm\Jamf\Pro\Data\AzureServerConfiguration;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CloudAzure\CreateCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\DeleteCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureDefaultsMappingsV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureDefaultsServerConfigurationV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\GetCloudAzureV1Request;
use spkm\Jamf\Pro\Requests\CloudAzure\ReplaceCloudAzureV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The cloud-azure endpoints of the Jamf Pro API, from Jamf::cloudAzure().
 *
 * @extends BaseResource<Data>
 */
class CloudAzureResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create Azure Cloud Identity Provider configuration: POST /v1/cloud-azure.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCloudAzureV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateCloudAzureV1Request($body, $options));
    }

    /**
     * Delete Cloud Identity Provider configuration: DELETE /v1/cloud-azure/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCloudAzureV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteCloudAzureV1Request($id, $options));
    }

    /**
     * Get default mappings: GET /v1/cloud-azure/defaults/mappings.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-05-21.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudAzureDefaultsMappingsV1(array $options = []): ?AzureMappings
    {
        return $this->fetch(new GetCloudAzureDefaultsMappingsV1Request($options));
    }

    /**
     * Get default server configuration: GET /v1/cloud-azure/defaults/server-configuration.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudAzureDefaultsServerConfigurationV1(array $options = []): ?AzureServerConfiguration
    {
        return $this->fetch(new GetCloudAzureDefaultsServerConfigurationV1Request($options));
    }

    /**
     * Get Azure Cloud Identity Provider configuration with given ID: GET /v1/cloud-azure/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudAzureV1(int|string $id, array $options = []): ?AzureConfiguration
    {
        return $this->fetch(new GetCloudAzureV1Request($id, $options));
    }

    /**
     * Update Azure Cloud Identity Provider configuration: PUT /v1/cloud-azure/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCloudAzureV1(int|string $id, array|JsonSerializable $body, array $options = []): ?AzureConfiguration
    {
        return $this->fetch(new ReplaceCloudAzureV1Request($id, $body, $options));
    }
}
