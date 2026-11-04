<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\ComputerGroup;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\SmartComputerGroupSearch;
use spkm\Jamf\Pro\Data\SmartComputerGroupV2;
use spkm\Jamf\Pro\Data\SmartComputerGroupV3;
use spkm\Jamf\Pro\Data\SmartGroupMembership;
use spkm\Jamf\Pro\Data\StaticComputerGroup;
use spkm\Jamf\Pro\Data\StaticComputerGroupAssignment;
use spkm\Jamf\Pro\Data\StaticComputerGroupSummary;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsSmartGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\CreateComputerGroupsStaticGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\DeleteComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupMembershipV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupMembershipV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupsV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupsV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\GetComputerGroupsV1Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsSmartGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsSmartGroupV3Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsStaticGroupV2Request;
use spkm\Jamf\Pro\Requests\ComputerGroups\ReplaceComputerGroupsStaticGroupV3Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The computer-groups endpoints of the Jamf Pro API, from Jamf::computerGroups().
 *
 * @extends Builder<SmartComputerGroupSearch>
 */
class ComputerGroupsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, SmartComputerGroupSearch::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetComputerGroupsSmartGroupsV3Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetComputerGroupsSmartGroupV3Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateComputerGroupsSmartGroupsV3Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceComputerGroupsSmartGroupV3Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteComputerGroupsSmartGroupV3Request($id);
    }

    /**
     * Create a Smart Computer Group: POST /v2/computer-groups/smart-groups.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createComputerGroupsSmartGroupsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerGroupsSmartGroupsV2Request($body, $options));
    }

    /**
     * Create a Smart Computer Group: POST /v3/computer-groups/smart-groups.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createComputerGroupsSmartGroupsV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerGroupsSmartGroupsV3Request($body, $options));
    }

    /**
     * Create membership of a static computer group: POST /v2/computer-groups/static-groups.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createComputerGroupsStaticGroupsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerGroupsStaticGroupsV2Request($body, $options));
    }

    /**
     * Create membership of a static computer group: POST /v3/computer-groups/static-groups.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createComputerGroupsStaticGroupsV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerGroupsStaticGroupsV3Request($body, $options));
    }

    /**
     * Remove specified Smart Computer Group: DELETE /v2/computer-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerGroupsSmartGroupV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerGroupsSmartGroupV2Request($id, $options));
    }

    /**
     * Remove specified Smart Computer Group: DELETE /v3/computer-groups/smart-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerGroupsSmartGroupV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerGroupsSmartGroupV3Request($id, $options));
    }

    /**
     * Remove Static Computer Group by Id: DELETE /v2/computer-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerGroupsStaticGroupV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerGroupsStaticGroupV2Request($id, $options));
    }

    /**
     * Remove Static Computer Group by Id: DELETE /v3/computer-groups/static-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerGroupsStaticGroupV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerGroupsStaticGroupV3Request($id, $options));
    }

    /**
     * Get the membership of a Smart Computer Group: GET /v2/computer-groups/smart-group-membership/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsSmartGroupMembershipV2(int|string $id, array $options = []): ?SmartGroupMembership
    {
        return $this->fetch(new GetComputerGroupsSmartGroupMembershipV2Request($id, $options));
    }

    /**
     * Get the membership of a Smart Computer Group: GET /v3/computer-groups/smart-group-membership/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsSmartGroupMembershipV3(int|string $id, array $options = []): ?SmartGroupMembership
    {
        return $this->fetch(new GetComputerGroupsSmartGroupMembershipV3Request($id, $options));
    }

    /**
     * Get Smart Computer Group by Id: GET /v2/computer-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsSmartGroupV2(int|string $id, array $options = []): ?SmartComputerGroupV2
    {
        return $this->fetch(new GetComputerGroupsSmartGroupV2Request($id, $options));
    }

    /**
     * Get Smart Computer Group by Id: GET /v3/computer-groups/smart-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsSmartGroupV3(int|string $id, array $options = []): ?SmartComputerGroupV3
    {
        return $this->fetch(new GetComputerGroupsSmartGroupV3Request($id, $options));
    }

    /**
     * Search for Smart Computer Groups: GET /v2/computer-groups/smart-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<SmartComputerGroupSearch>
     */
    public function getComputerGroupsSmartGroupsV2(): PagedResource
    {
        return new PagedResource($this->pro(), SmartComputerGroupSearch::class, fn (Query $query) => new GetComputerGroupsSmartGroupsV2Request($query));
    }

    /**
     * Search for Smart Computer Groups: GET /v3/computer-groups/smart-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SmartComputerGroupSearch>
     */
    public function getComputerGroupsSmartGroupsV3(): PagedResource
    {
        return new PagedResource($this->pro(), SmartComputerGroupSearch::class, fn (Query $query) => new GetComputerGroupsSmartGroupsV3Request($query));
    }

    /**
     * Get Static Computer Group by Id: GET /v2/computer-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsStaticGroupV2(int|string $id, array $options = []): ?StaticComputerGroup
    {
        return $this->fetch(new GetComputerGroupsStaticGroupV2Request($id, $options));
    }

    /**
     * Get Static Computer Group by Id: GET /v3/computer-groups/static-groups/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerGroupsStaticGroupV3(int|string $id, array $options = []): ?StaticComputerGroup
    {
        return $this->fetch(new GetComputerGroupsStaticGroupV3Request($id, $options));
    }

    /**
     * Search for Static Computer Groups: GET /v2/computer-groups/static-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @return PagedResource<StaticComputerGroupSummary>
     */
    public function getComputerGroupsStaticGroupsV2(): PagedResource
    {
        return new PagedResource($this->pro(), StaticComputerGroupSummary::class, fn (Query $query) => new GetComputerGroupsStaticGroupsV2Request($query));
    }

    /**
     * Search for Static Computer Groups: GET /v3/computer-groups/static-groups.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<StaticComputerGroupSummary>
     */
    public function getComputerGroupsStaticGroupsV3(): PagedResource
    {
        return new PagedResource($this->pro(), StaticComputerGroupSummary::class, fn (Query $query) => new GetComputerGroupsStaticGroupsV3Request($query));
    }

    /**
     * Returns the list of all computer groups: GET /v1/computer-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ComputerGroup>
     */
    public function getComputerGroupsV1(array $options = []): Collection
    {
        return $this->fetch(new GetComputerGroupsV1Request($options));
    }

    /**
     * Update a Smart Computer Group: PUT /v2/computer-groups/smart-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerGroupsSmartGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): ?SmartComputerGroupV2
    {
        return $this->fetch(new ReplaceComputerGroupsSmartGroupV2Request($id, $body, $options));
    }

    /**
     * Update a Smart Computer Group: PUT /v3/computer-groups/smart-groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerGroupsSmartGroupV3(int|string $id, array|JsonSerializable $body, array $options = []): ?SmartComputerGroupV3
    {
        return $this->fetch(new ReplaceComputerGroupsSmartGroupV3Request($id, $body, $options));
    }

    /**
     * Update membership of a static computer group: PUT /v2/computer-groups/static-groups/{id}.
     *
     * @deprecated Jamf deprecated this endpoint on 2026-05-28.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerGroupsStaticGroupV2(int|string $id, array|JsonSerializable $body, array $options = []): ?StaticComputerGroupAssignment
    {
        return $this->fetch(new ReplaceComputerGroupsStaticGroupV2Request($id, $body, $options));
    }

    /**
     * Update membership of a static computer group: PUT /v3/computer-groups/static-groups/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerGroupsStaticGroupV3(int|string $id, array|JsonSerializable $body, array $options = []): ?StaticComputerGroupAssignment
    {
        return $this->fetch(new ReplaceComputerGroupsStaticGroupV3Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
