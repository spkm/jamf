<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Pro\Data\InventoryPreloadRecordV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get an Inventory Preload record: GET /v2/inventory-preload/records/{id}.
 *
 * Retrieves an Inventory Preload record.
 */
class GetInventoryPreloadRecordV2Request extends GetRequest
{
    protected ?string $dto = InventoryPreloadRecordV2::class;

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
