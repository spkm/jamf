<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Pro\Data\CloudDistributionPoint;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the cloud distribution point Details: GET /v1/cloud-distribution-point.
 *
 * Retrieves the details of the cloud distribution point. The distribution point exists only when a content delivery
 * network (CDN) is configured, such as Jamf Cloud(JAMF_CLOUD), Rackspace Cloud Files(RACKSPACE_CLOUD_FILES), Amazon
 * Web Services(AMAZON_S3) or Akamai(AKAMAI). If the **cdnType** is **NONE** the response will be NONE empty CDP
 * object, indicating no distribution point is set up.
 */
class GetCloudDistributionPointV1Request extends GetRequest
{
    protected ?string $dto = CloudDistributionPoint::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point';
    }
}
