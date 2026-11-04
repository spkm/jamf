<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV3;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Return paginated Computer Inventory records: GET /v3/computers-inventory.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetComputersInventoryV3Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected bool $sectioned = true;

    protected ?string $dto = ComputerInventoryV3::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computers-inventory';
    }
}
