<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Inventory Preload history entries: GET /v2/inventory-preload/history.
 *
 * Gets Inventory Preload history entries.
 */
class GetInventoryPreloadHistoryV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/inventory-preload/history';
    }
}
