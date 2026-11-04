<?php

namespace spkm\Jamf\Pro\Requests\CloudAzure;

use spkm\Jamf\Pro\Data\AzureConfiguration;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Azure Cloud Identity Provider configuration with given ID: GET /v1/cloud-azure/{id}.
 */
class GetCloudAzureV1Request extends GetRequest
{
    protected ?string $dto = AzureConfiguration::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-azure/'.Path::segment((string) $this->id);
    }
}
