<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\StaticGroup;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Static Groups: GET /v1/mobile-device-groups/static-groups.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetMobileDeviceGroupsStaticGroupsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = StaticGroup::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-groups/static-groups';
    }
}
