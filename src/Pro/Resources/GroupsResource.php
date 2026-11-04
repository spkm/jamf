<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\GroupDtoV1;
use spkm\Jamf\Pro\Data\GroupWithCriteriaDtoV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Groups\DeleteGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\DeleteGroupV2Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupsV1Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupsV2Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\GetGroupV2Request;
use spkm\Jamf\Pro\Requests\Groups\UpdateGroupV1Request;
use spkm\Jamf\Pro\Requests\Groups\UpdateGroupV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The groups endpoints of the Jamf Pro API, from Jamf::groups().
 *
 * @extends Builder<GroupDtoV1>
 */
class GroupsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, GroupDtoV1::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGroupsV2Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetGroupV2Request($id);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new UpdateGroupV2Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteGroupV2Request($id);
    }

    /**
     * Delete a group by platform UUID: DELETE /v1/groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteGroupV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteGroupV1Request($id, $options));
    }

    /**
     * Delete a group by platform UUID: DELETE /v2/groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteGroupV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteGroupV2Request($id, $options));
    }

    /**
     * Returns group information for the given platform UUID: GET /v1/groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getGroupV1(int|string $id, array $options = []): ?GroupWithCriteriaDtoV1
    {
        return $this->fetch(new GetGroupV1Request($id, $options));
    }

    /**
     * Returns group information for the given platform UUID: GET /v2/groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getGroupV2(int|string $id, array $options = []): ?GroupWithCriteriaDtoV1
    {
        return $this->fetch(new GetGroupV2Request($id, $options));
    }

    /**
     * Returns group information for all Mobile Device and Computer groups: GET /v1/groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<GroupDtoV1>
     */
    public function getGroupsV1(): PagedResource
    {
        return new PagedResource($this->pro(), GroupDtoV1::class, fn (Query $query) => new GetGroupsV1Request($query));
    }

    /**
     * Returns group information for all Mobile Device and Computer groups: GET /v2/groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<GroupDtoV1>
     */
    public function getGroupsV2(): PagedResource
    {
        return new PagedResource($this->pro(), GroupDtoV1::class, fn (Query $query) => new GetGroupsV2Request($query));
    }

    /**
     * Update a group by platform UUID: PATCH /v1/groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateGroupV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateGroupV1Request($id, $body, $options));
    }

    /**
     * Update a group by platform UUID: PATCH /v2/groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateGroupV2Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
