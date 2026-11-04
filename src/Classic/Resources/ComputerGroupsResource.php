<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\CreateComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\DeleteComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\FindComputerGroupsRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\UpdateComputerGroupByIdRequest;

/**
 * The computergroups endpoints of the Classic API, from Jamf::classic()->computerGroups().
 */
class ComputerGroupsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerGroupsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindComputerGroupsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateComputerGroupByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateComputerGroupByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteComputerGroupByIdRequest($id);
    }

    /**
     * Creates a new computer group by id: POST /computergroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_group>), or the XML itself.
     */
    public function createComputerGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerGroupByIdRequest($id, $record));
    }

    /**
     * Deletes a computer group by id: DELETE /computergroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerGroupById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerGroupByIdRequest($id, $options));
    }

    /**
     * Finds all computer groups: GET /computergroups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerGroups(array $options = []): Collection
    {
        return $this->fetch(new FindComputerGroupsRequest($options));
    }

    /**
     * Finds computer groups by id: GET /computergroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerGroupsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputerGroupsByIdRequest($id, $options));
    }

    /**
     * Finds computer groups by name: GET /computergroups/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerGroupsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerGroupsByNameRequest($name, $options));
    }

    /**
     * Updates an existing computer group by id: PUT /computergroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_group>), or the XML itself.
     */
    public function updateComputerGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateComputerGroupByIdRequest($id, $record));
    }
}
