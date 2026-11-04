<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use spkm\Jamf\Pro\Data\SmartComputerGroupSearch;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for Smart Computer Groups: GET /v2/computer-groups/smart-groups.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetComputerGroupsSmartGroupsV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = SmartComputerGroupSearch::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-groups/smart-groups';
    }
}
