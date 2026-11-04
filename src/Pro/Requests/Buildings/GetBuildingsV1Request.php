<?php

namespace spkm\Jamf\Pro\Requests\Buildings;

use spkm\Jamf\Pro\Data\Building;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for sorted and paged Buildings: GET /v1/buildings.
 *
 * Search for sorted and paged buildings
 */
class GetBuildingsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = Building::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/buildings';
    }
}
