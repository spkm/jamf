<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Return paginated FileVault information for all computers: GET /v4/computers-inventory/filevault.
 */
class GetComputersInventoryFilevaultV4Request extends ListRequest
{
    protected ?string $dto = ComputerInventoryFileVault::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v4/computers-inventory/filevault';
    }
}
