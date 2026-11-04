<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\CreateSoftwareUpdateServerByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\DeleteSoftwareUpdateServerByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersByIdRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersByNameRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\FindSoftwareUpdateServersRequest;
use spkm\Jamf\Classic\Requests\SoftwareUpdateServers\UpdateSoftwareUpdateServerByIdRequest;

/**
 * The softwareupdateservers endpoints of the Classic API, from Jamf::classic()->softwareUpdateServers().
 */
class SoftwareUpdateServersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindSoftwareUpdateServersRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindSoftwareUpdateServersByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateSoftwareUpdateServerByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateSoftwareUpdateServerByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteSoftwareUpdateServerByIdRequest($id);
    }

    /**
     * Creates a new software update server by id: POST /softwareupdateservers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <software_update_server>), or the XML itself.
     */
    public function createSoftwareUpdateServerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateSoftwareUpdateServerByIdRequest($id, $record));
    }

    /**
     * Deletes a software update server by id: DELETE /softwareupdateservers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSoftwareUpdateServerById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSoftwareUpdateServerByIdRequest($id, $options));
    }

    /**
     * Finds all software update servers: GET /softwareupdateservers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findSoftwareUpdateServers(array $options = []): Collection
    {
        return $this->fetch(new FindSoftwareUpdateServersRequest($options));
    }

    /**
     * Finds software update servers by id: GET /softwareupdateservers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSoftwareUpdateServersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindSoftwareUpdateServersByIdRequest($id, $options));
    }

    /**
     * Finds software update servers by name: GET /softwareupdateservers/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSoftwareUpdateServersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindSoftwareUpdateServersByNameRequest($name, $options));
    }

    /**
     * Updates an existing software update server by id: PUT /softwareupdateservers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <software_update_server>), or the XML itself.
     */
    public function updateSoftwareUpdateServerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateSoftwareUpdateServerByIdRequest($id, $record));
    }
}
