<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete an Inventory Preload record: DELETE /v2/inventory-preload/records/{id}.
 *
 * Deletes an Inventory Preload record.
 */
class DeleteInventoryPreloadRecordV2Request extends DeleteRequest
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
        return '/v2/inventory-preload/records/'.Path::segment((string) $this->id);
    }
}
