<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Return paginated FileVault information for all computers: GET /v1/computers-inventory/filevault.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputersInventoryFilevaultV1Request extends ListRequest
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
        return '/v1/computers-inventory/filevault';
    }
}
