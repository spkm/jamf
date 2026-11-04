<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\InventoryListMobileDevice;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Static Group Membership by Id: GET /v2/mobile-device-groups/static-group-membership/{id}.
 */
class GetMobileDeviceGroupsStaticGroupMembershipV2Request extends ListRequest
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
        return '/v2/mobile-device-groups/static-group-membership/'.Path::segment((string) $this->id);
    }
}
