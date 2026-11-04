<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\CloudIdPCommon;
use spkm\Jamf\Pro\Data\CloudIdPCommonResponse;
use spkm\Jamf\Pro\Data\GroupTestSearch;
use spkm\Jamf\Pro\Data\MembershipTestSearchResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\UserTestSearch;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CloudIdp\CreateCloudIdpHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\ExportCloudIdpV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpByIdV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\GetCloudIdpV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpGroupV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpUserMembershipV1Request;
use spkm\Jamf\Pro\Requests\CloudIdp\TestCloudIdpUserV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The cloud-idp endpoints of the Jamf Pro API, from Jamf::cloudIdp().
 *
 * @extends Builder<CloudIdPCommonResponse>
 */
class CloudIdpResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, CloudIdPCommonResponse::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCloudIdpV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetCloudIdpByIdV1Request($id);
    }

    /**
     * Add Cloud Identity Provider history note: POST /v1/cloud-idp/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCloudIdpHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateCloudIdpHistoryV1Request($id, $body, $options));
    }

    /**
     * Export Cloud Identity Providers collection: POST /v1/cloud-idp/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportCloudIdpV1(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportCloudIdpV1Request($body, $options));
    }

    /**
     * Get Cloud Identity Provider configuration with given ID: GET /v1/cloud-idp/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudIdpByIdV1(int|string $id, array $options = []): ?CloudIdPCommon
    {
        return $this->fetch(new GetCloudIdpByIdV1Request($id, $options));
    }

    /**
     * Get Cloud Identity Provider history: GET /v1/cloud-idp/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getCloudIdpHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetCloudIdpHistoryV1Request($id, $query));
    }

    /**
     * Get information about all Cloud Identity Providers configurations: GET /v1/cloud-idp.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<CloudIdPCommonResponse>
     */
    public function getCloudIdpV1(): PagedResource
    {
        return new PagedResource($this->pro(), CloudIdPCommonResponse::class, fn (Query $query) => new GetCloudIdpV1Request($query));
    }

    /**
     * Get group test search: POST /v1/cloud-idp/{id}/test-group.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, GroupTestSearch>
     */
    public function testCloudIdpGroupV1(int|string $id, array|JsonSerializable $body, array $options = []): Collection
    {
        return $this->fetch(new TestCloudIdpGroupV1Request($id, $body, $options));
    }

    /**
     * Get membership test search: POST /v1/cloud-idp/{id}/test-user-membership.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function testCloudIdpUserMembershipV1(int|string $id, array|JsonSerializable $body, array $options = []): ?MembershipTestSearchResponse
    {
        return $this->fetch(new TestCloudIdpUserMembershipV1Request($id, $body, $options));
    }

    /**
     * Get user test search: POST /v1/cloud-idp/{id}/test-user.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, UserTestSearch>
     */
    public function testCloudIdpUserV1(int|string $id, array|JsonSerializable $body, array $options = []): Collection
    {
        return $this->fetch(new TestCloudIdpUserV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
