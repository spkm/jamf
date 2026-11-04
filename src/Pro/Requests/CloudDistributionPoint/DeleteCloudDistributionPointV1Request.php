<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Requests\DeleteRequest;

/**
 * Delete cloud distribution point: DELETE /v1/cloud-distribution-point.
 *
 * The cloud distribution point and inventory details to be deleted.
 */
class DeleteCloudDistributionPointV1Request extends DeleteRequest
{
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
