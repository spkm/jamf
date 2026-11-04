<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\CreateRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\DeleteRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareByNameRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\FindRestrictedSoftwareRequest;
use spkm\Jamf\Classic\Requests\RestrictedSoftware\UpdateRestrictedSoftwareByIdRequest;

/**
 * The restrictedsoftware endpoints of the Classic API, from Jamf::classic()->restrictedSoftware().
 */
class RestrictedSoftwareResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindRestrictedSoftwareRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindRestrictedSoftwareByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateRestrictedSoftwareByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateRestrictedSoftwareByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteRestrictedSoftwareByIdRequest($id);
    }

    /**
     * Creates a new restricted software by id: POST /restrictedsoftware/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <restricted_software>), or the XML itself.
     */
    public function createRestrictedSoftwareById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateRestrictedSoftwareByIdRequest($id, $record));
    }

    /**
     * Deletes a restricted software by id: DELETE /restrictedsoftware/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteRestrictedSoftwareById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteRestrictedSoftwareByIdRequest($id, $options));
    }

    /**
     * Finds all restricted software: GET /restrictedsoftware.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findRestrictedSoftware(array $options = []): Collection
    {
        return $this->fetch(new FindRestrictedSoftwareRequest($options));
    }

    /**
     * Finds restricted software by id: GET /restrictedsoftware/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findRestrictedSoftwareById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindRestrictedSoftwareByIdRequest($id, $options));
    }

    /**
     * Finds restricted software by name: GET /restrictedsoftware/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findRestrictedSoftwareByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindRestrictedSoftwareByNameRequest($name, $options));
    }

    /**
     * Updates an existing restricted software by id: PUT /restrictedsoftware/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <restricted_software>), or the XML itself.
     */
    public function updateRestrictedSoftwareById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateRestrictedSoftwareByIdRequest($id, $record));
    }
}
