<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV2;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Return paginated Computer Inventory records: GET /v2/computers-inventory.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class GetComputersInventoryV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected bool $sectioned = true;

    protected ?string $dto = ComputerInventoryV2::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computers-inventory';
    }
}
