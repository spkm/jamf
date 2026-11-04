<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Delete all Inventory Preload records: POST /v2/inventory-preload/records/delete-all.
 *
 * Deletes all Inventory Preload records.
 */
class DeleteInventoryPreloadRecordsAllV2Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/inventory-preload/records/delete-all';
    }
}
