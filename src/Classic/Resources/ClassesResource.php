<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\Classes\CreateClassByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\DeleteClassByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesByIdRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesByNameRequest;
use spkm\Jamf\Classic\Requests\Classes\FindClassesRequest;
use spkm\Jamf\Classic\Requests\Classes\UpdateClassByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The classes endpoints of the Classic API, from Jamf::classic()->classes().
 */
class ClassesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindClassesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindClassesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateClassByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateClassByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteClassByIdRequest($id);
    }

    /**
     * Creates a new class by id. The mobile device list is not used in the POST, the mobile device group is used
     * instead: POST /classes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <class>), or the XML itself.
     */
    public function createClassById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateClassByIdRequest($id, $record));
    }

    /**
     * Deletes a class by id: DELETE /classes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteClassById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteClassByIdRequest($id, $options));
    }

    /**
     * Finds all classes: GET /classes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findClasses(array $options = []): Collection
    {
        return $this->fetch(new FindClassesRequest($options));
    }

    /**
     * Finds classes by id: GET /classes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findClassesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindClassesByIdRequest($id, $options));
    }

    /**
     * Finds classes by name: GET /classes/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findClassesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindClassesByNameRequest($name, $options));
    }

    /**
     * Updates an existing class by id. The mobile device list is not used in the POST, the mobile device group is
     * used instead: PUT /classes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <class>), or the XML itself.
     */
    public function updateClassById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateClassByIdRequest($id, $record));
    }
}
