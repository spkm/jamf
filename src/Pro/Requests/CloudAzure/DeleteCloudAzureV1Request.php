<?php

namespace spkm\Jamf\Pro\Requests\CloudAzure;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Cloud Identity Provider configuration: DELETE /v1/cloud-azure/{id}.
 */
class DeleteCloudAzureV1Request extends DeleteRequest
{
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
