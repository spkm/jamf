<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Marks a specific file upload as failed for the currently configured cloud distribution point: POST /v1/cloud-distribution-point/fail-upload/{id}.
 */
class CreateCloudDistributionPointFailUploadV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: file-name (required), type (required).
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point/fail-upload/'.Path::segment((string) $this->id);
    }
}
