<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\InventoryListMobileDevice;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Static Group Membership by Id: GET /v1/mobile-device-groups/static-group-membership/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetMobileDeviceGroupsStaticGroupMembershipV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = InventoryListMobileDevice::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-groups/static-group-membership/'.Path::segment((string) $this->id);
    }
}
