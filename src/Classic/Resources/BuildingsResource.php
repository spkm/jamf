<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\Buildings\CreateBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\DeleteBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsByNameRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsRequest;
use spkm\Jamf\Classic\Requests\Buildings\UpdateBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The buildings endpoints of the Classic API, from Jamf::classic()->buildings().
 */
class BuildingsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindBuildingsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindBuildingsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateBuildingByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateBuildingByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteBuildingByIdRequest($id);
    }

    /**
     * Creates a new building by id: POST /buildings/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <building>), or the XML itself.
     */
    public function createBuildingById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateBuildingByIdRequest($id, $record));
    }

    /**
     * Deletes a building by id: DELETE /buildings/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteBuildingById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteBuildingByIdRequest($id, $options));
    }

    /**
     * Finds all buildings: GET /buildings.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findBuildings(array $options = []): Collection
    {
        return $this->fetch(new FindBuildingsRequest($options));
    }

    /**
     * Finds buildings by id: GET /buildings/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findBuildingsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindBuildingsByIdRequest($id, $options));
    }

    /**
     * Finds buildings by name: GET /buildings/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findBuildingsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindBuildingsByNameRequest($name, $options));
    }

    /**
     * Updates an existing building by id: PUT /buildings/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <building>), or the XML itself.
     */
    public function updateBuildingById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateBuildingByIdRequest($id, $record));
    }
}
