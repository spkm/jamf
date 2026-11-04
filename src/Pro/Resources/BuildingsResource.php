<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\Building;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Buildings\CreateBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\CreateBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\DeleteBuildingV1Request;
use spkm\Jamf\Pro\Requests\Buildings\DeleteMultipleBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ExportBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ExportBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingHistoryV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ReplaceBuildingV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The buildings endpoints of the Jamf Pro API, from Jamf::buildings().
 *
 * @extends Builder<Building>
 */
class BuildingsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Building::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetBuildingsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetBuildingV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateBuildingsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceBuildingV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteBuildingV1Request($id);
    }

    /**
     * Add specified Building history object notes: POST /v1/buildings/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createBuildingHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateBuildingHistoryV1Request($id, $body, $options));
    }

    /**
     * Create Building record: POST /v1/buildings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createBuildingsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateBuildingsV1Request($body, $options));
    }

    /**
     * Remove specified Building record: DELETE /v1/buildings/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteBuildingV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteBuildingV1Request($id, $options));
    }

    /**
     * Delete multiple Buildings by their ids: POST /v1/buildings/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleBuildingsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleBuildingsV1Request($body, $options));
    }

    /**
     * Export history object collection in specified format for specified Buildings: POST
     * /v1/buildings/{id}/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportBuildingHistoryV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportBuildingHistoryV1Request($id, $body, $options));
    }

    /**
     * Export Buildings collection: POST /v1/buildings/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportBuildingsV1(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportBuildingsV1Request($body, $options));
    }

    /**
     * Get specified Building History object: GET /v1/buildings/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getBuildingHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetBuildingHistoryV1Request($id, $query));
    }

    /**
     * Get specified Building object: GET /v1/buildings/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getBuildingV1(int|string $id, array $options = []): ?Building
    {
        return $this->fetch(new GetBuildingV1Request($id, $options));
    }

    /**
     * Search for sorted and paged Buildings: GET /v1/buildings.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Building>
     */
    public function getBuildingsV1(): PagedResource
    {
        return new PagedResource($this->pro(), Building::class, fn (Query $query) => new GetBuildingsV1Request($query));
    }

    /**
     * Update specified Building object: PUT /v1/buildings/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceBuildingV1(int|string $id, array|JsonSerializable $body, array $options = []): ?Building
    {
        return $this->fetch(new ReplaceBuildingV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
