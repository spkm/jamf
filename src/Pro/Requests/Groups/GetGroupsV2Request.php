<?php

namespace spkm\Jamf\Pro\Requests\Groups;

use spkm\Jamf\Pro\Data\GroupDtoV1;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Returns group information for all Mobile Device and Computer groups: GET /v2/groups.
 */
class GetGroupsV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = GroupDtoV1::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/groups';
    }
}
