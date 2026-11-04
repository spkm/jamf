<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Pro\Data\CloudDistributionPointUploadCapability;
use spkm\Jamf\Requests\GetRequest;

/**
 * Finds specific information for the currently configured cloud distribution point: GET /v1/cloud-distribution-point/upload-capability.
 *
 * Finds a variety of values based on the currently configured cloud distribution point.
 */
class GetCloudDistributionPointUploadCapabilityV1Request extends GetRequest
{
    protected ?string $dto = CloudDistributionPointUploadCapability::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point/upload-capability';
    }
}
