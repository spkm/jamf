<?php

namespace spkm\Jamf\Pro\Requests\JamfCloudDistributionService;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Refreshes the inventory and status of uploads in Jamf Pro. This will update the status of uploads in the Jamf Pro database and allow the uploads to be deployed: POST /v1/jcds/refresh-inventory.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-08-28.
 */
class RefreshJcdsInventoryV1Request extends ActionRequest
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
        return '/v1/jcds/refresh-inventory';
    }
}
