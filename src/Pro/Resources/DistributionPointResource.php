<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\DistributionPoint;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DistributionPoint\CreateDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\CreateDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\DeleteDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\DeleteMultipleDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointsV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\GetDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\ReplaceDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\DistributionPoint\UpdateDistributionPointV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The distribution-point endpoints of the Jamf Pro API, from Jamf::distributionPoint().
 *
 * @extends Builder<DistributionPoint>
 */
class DistributionPointResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, DistributionPoint::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDistributionPointsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetDistributionPointV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateDistributionPointsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new UpdateDistributionPointV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteDistributionPointV1Request($id);
    }

    /**
     * Add specified distribution point History object notes: POST /v1/distribution-points/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDistributionPointHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateDistributionPointHistoryV1Request($id, $body, $options));
    }

    /**
     * Create distribution point: POST /v1/distribution-points.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDistributionPointsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateDistributionPointsV1Request($body, $options));
    }

    /**
     * Remove specified distribution point: DELETE /v1/distribution-points/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDistributionPointV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDistributionPointV1Request($id, $options));
    }

    /**
     * Delete multiple distribution points at once: POST /v1/distribution-points/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleDistributionPointsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleDistributionPointsV1Request($body, $options));
    }

    /**
     * Get specified distribution point History object: GET /v1/distribution-points/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getDistributionPointHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetDistributionPointHistoryV1Request($id, $query));
    }

    /**
     * Get specified distribution point: GET /v1/distribution-points/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDistributionPointV1(int|string $id, array $options = []): ?DistributionPoint
    {
        return $this->fetch(new GetDistributionPointV1Request($id, $options));
    }

    /**
     * Finds all Distribution Points: GET /v1/distribution-points.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<DistributionPoint>
     */
    public function getDistributionPointsV1(): PagedResource
    {
        return new PagedResource($this->pro(), DistributionPoint::class, fn (Query $query) => new GetDistributionPointsV1Request($query));
    }

    /**
     * Update specified distribution point object: PUT /v1/distribution-points/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDistributionPointV1(int|string $id, array|JsonSerializable $body, array $options = []): ?DistributionPoint
    {
        return $this->fetch(new ReplaceDistributionPointV1Request($id, $body, $options));
    }

    /**
     * Update specified distribution point object: PATCH /v1/distribution-points/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateDistributionPointV1(int|string $id, array|JsonSerializable $body, array $options = []): ?DistributionPoint
    {
        return $this->fetch(new UpdateDistributionPointV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
