<?php

namespace spkm\Jamf\Pro\Requests\CloudDistributionPoint;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Updates inventory data for the currently configured cloud distribution point: POST /v1/cloud-distribution-point/refresh-inventory.
 */
class RefreshCloudDistributionPointInventoryV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: file-name.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/cloud-distribution-point/refresh-inventory';
    }
}
