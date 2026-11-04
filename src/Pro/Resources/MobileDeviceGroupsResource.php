<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\InventoryListMobileDevice;
use spkm\Jamf\Pro\Data\MobileDeviceGroup;
use spkm\Jamf\Pro\Data\SmartGroup;
use spkm\Jamf\Pro\Data\SmartGroupAssignment;
use spkm\Jamf\Pro\Data\SmartGroupAssignmentV2;
use spkm\Jamf\Pro\Data\SmartGroupDetail;
use spkm\Jamf\Pro\Data\SmartGroupDetailV2;
use spkm\Jamf\Pro\Data\StaticGroup;
use spkm\Jamf\Pro\Data\StaticGroupAssignment;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\CreateMobileDeviceGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\EraseMobileDeviceGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\EraseMobileDeviceGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\GetMobileDeviceGroupsV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\ReplaceMobileDeviceGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV1Request;
use spkm\Jamf\Pro\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupsStaticGroupV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The mobile-device-groups endpoints of the Jamf Pro API, from Jamf::mobileDeviceGroups().
 *
 * @extends Builder<SmartGroup>
 */
class MobileDeviceGroupsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, SmartGroup::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMobileDeviceGroupsSmartGroupsV2Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetMobileDeviceGroupsSmartGroupV2Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateMobileDeviceGroupsSmartGroupsV2Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceMobileDeviceGroupsSmartGroupV2Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteMobileDeviceGroupsSmartGroupV2Request($id);
    }

    /**
     * Create a smart group: POST /v1/mobile-device-groups/smart-groups.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createMobileDeviceGroupsSmartGroupsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDeviceGroupsSmartGroupsV1Request($body, $options));
    }

    /**
     * Create a smart group: POST /v2/mobile-device-groups/smart-groups.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createMobileDeviceGroupsSmartGroupsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDeviceGroupsSmartGroupsV2Request($body, $options));
    }

    /**
     * Create membership of a static group: POST /v1/mobile-device-groups/static-groups.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createMobileDeviceGroupsStaticGroupsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDeviceGroupsStaticGroupsV1Request($body, $options));
    }

    /**
     * Create a static group: POST /v2/mobile-device-groups/static-groups.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createMobileDeviceGroupsStaticGroupsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateMobileDeviceGroupsStaticGroupsV2Request($body, $options));
    }

    /**
     * Remove Smart Group by Id: DELETE /v1/mobile-device-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceGroupsSmartGroupV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceGroupsSmartGroupV1Request($id, $options));
    }

    /**
     * Remove Smart Group by Id: DELETE /v2/mobile-device-groups/smart-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceGroupsSmartGroupV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceGroupsSmartGroupV2Request($id, $options));
    }

    /**
     * Remove Static Group by Id: DELETE /v1/mobile-device-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceGroupsStaticGroupV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceGroupsStaticGroupV1Request($id, $options));
    }

    /**
     * Remove Static Group by Id: DELETE /v2/mobile-device-groups/static-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceGroupsStaticGroupV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceGroupsStaticGroupV2Request($id, $options));
    }

    /**
     * Erase all devices in the group: POST /v1/mobile-device-groups/{id}/erase.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function eraseMobileDeviceGroupV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new EraseMobileDeviceGroupV1Request($id, $body, $options));
    }

    /**
     * Erase all devices in the group: POST /v2/mobile-device-groups/{id}/erase.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function eraseMobileDeviceGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new EraseMobileDeviceGroupV2Request($id, $body, $options));
    }

    /**
     * Get Smart Group Membership by Id: GET /v1/mobile-device-groups/smart-group-membership/{id}.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<InventoryListMobileDevice>
     */
    public function getMobileDeviceGroupsSmartGroupMembershipV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), InventoryListMobileDevice::class, fn (Query $query) => new GetMobileDeviceGroupsSmartGroupMembershipV1Request($id, $query));
    }

    /**
     * Get Smart Group Membership by Id: GET /v2/mobile-device-groups/smart-group-membership/{id}.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<InventoryListMobileDevice>
     */
    public function getMobileDeviceGroupsSmartGroupMembershipV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), InventoryListMobileDevice::class, fn (Query $query) => new GetMobileDeviceGroupsSmartGroupMembershipV2Request($id, $query));
    }

    /**
     * Get Smart Group by Id: GET /v1/mobile-device-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceGroupsSmartGroupV1(int|string $id, array $options = []): ?SmartGroupDetail
    {
        return $this->fetch(new GetMobileDeviceGroupsSmartGroupV1Request($id, $options));
    }

    /**
     * Get Smart Group by Id: GET /v2/mobile-device-groups/smart-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceGroupsSmartGroupV2(int|string $id, array $options = []): ?SmartGroupDetailV2
    {
        return $this->fetch(new GetMobileDeviceGroupsSmartGroupV2Request($id, $options));
    }

    /**
     * Get Smart Groups: GET /v1/mobile-device-groups/smart-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<SmartGroup>
     */
    public function getMobileDeviceGroupsSmartGroupsV1(): PagedResource
    {
        return new PagedResource($this->pro(), SmartGroup::class, fn (Query $query) => new GetMobileDeviceGroupsSmartGroupsV1Request($query));
    }

    /**
     * Get Smart Groups: GET /v2/mobile-device-groups/smart-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SmartGroup>
     */
    public function getMobileDeviceGroupsSmartGroupsV2(): PagedResource
    {
        return new PagedResource($this->pro(), SmartGroup::class, fn (Query $query) => new GetMobileDeviceGroupsSmartGroupsV2Request($query));
    }

    /**
     * Get Static Group Membership by Id: GET /v1/mobile-device-groups/static-group-membership/{id}.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<InventoryListMobileDevice>
     */
    public function getMobileDeviceGroupsStaticGroupMembershipV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), InventoryListMobileDevice::class, fn (Query $query) => new GetMobileDeviceGroupsStaticGroupMembershipV1Request($id, $query));
    }

    /**
     * Get Static Group Membership by Id: GET /v2/mobile-device-groups/static-group-membership/{id}.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<InventoryListMobileDevice>
     */
    public function getMobileDeviceGroupsStaticGroupMembershipV2(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), InventoryListMobileDevice::class, fn (Query $query) => new GetMobileDeviceGroupsStaticGroupMembershipV2Request($id, $query));
    }

    /**
     * Get Static Group by Id: GET /v1/mobile-device-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceGroupsStaticGroupV1(int|string $id, array $options = []): ?StaticGroup
    {
        return $this->fetch(new GetMobileDeviceGroupsStaticGroupV1Request($id, $options));
    }

    /**
     * Get Static Group by Id: GET /v2/mobile-device-groups/static-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceGroupsStaticGroupV2(int|string $id, array $options = []): ?StaticGroup
    {
        return $this->fetch(new GetMobileDeviceGroupsStaticGroupV2Request($id, $options));
    }

    /**
     * Get Static Groups: GET /v1/mobile-device-groups/static-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<StaticGroup>
     */
    public function getMobileDeviceGroupsStaticGroupsV1(): PagedResource
    {
        return new PagedResource($this->pro(), StaticGroup::class, fn (Query $query) => new GetMobileDeviceGroupsStaticGroupsV1Request($query));
    }

    /**
     * Get Static Groups: GET /v2/mobile-device-groups/static-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<StaticGroup>
     */
    public function getMobileDeviceGroupsStaticGroupsV2(): PagedResource
    {
        return new PagedResource($this->pro(), StaticGroup::class, fn (Query $query) => new GetMobileDeviceGroupsStaticGroupsV2Request($query));
    }

    /**
     * Return the list of all Mobile Device Groups: GET /v1/mobile-device-groups.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, MobileDeviceGroup>
     */
    public function getMobileDeviceGroupsV1(array $options = []): Collection
    {
        return $this->fetch(new GetMobileDeviceGroupsV1Request($options));
    }

    /**
     * Return the list of all Mobile Device Groups: GET /v2/mobile-device-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, MobileDeviceGroup>
     */
    public function getMobileDeviceGroupsV2(array $options = []): Collection
    {
        return $this->fetch(new GetMobileDeviceGroupsV2Request($options));
    }

    /**
     * Update a smart group: PUT /v1/mobile-device-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDeviceGroupsSmartGroupV1(int|string $id, array|JsonSerializable $body, array $options = []): ?SmartGroupAssignment
    {
        return $this->fetch(new ReplaceMobileDeviceGroupsSmartGroupV1Request($id, $body, $options));
    }

    /**
     * Update a smart group: PUT /v2/mobile-device-groups/smart-groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceMobileDeviceGroupsSmartGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): ?SmartGroupAssignmentV2
    {
        return $this->fetch(new ReplaceMobileDeviceGroupsSmartGroupV2Request($id, $body, $options));
    }

    /**
     * Update membership of a static group: PATCH /v1/mobile-device-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateMobileDeviceGroupsStaticGroupV1(int|string $id, array|JsonSerializable $body, array $options = []): ?StaticGroupAssignment
    {
        return $this->fetch(new UpdateMobileDeviceGroupsStaticGroupV1Request($id, $body, $options));
    }

    /**
     * Update a static group: PATCH /v2/mobile-device-groups/static-groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateMobileDeviceGroupsStaticGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): ?StaticGroupAssignment
    {
        return $this->fetch(new UpdateMobileDeviceGroupsStaticGroupV2Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
