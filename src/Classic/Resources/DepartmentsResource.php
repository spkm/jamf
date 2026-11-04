<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Departments\CreateDepartmentByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\DeleteDepartmentByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsByIdRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsByNameRequest;
use spkm\Jamf\Classic\Requests\Departments\FindDepartmentsRequest;
use spkm\Jamf\Classic\Requests\Departments\UpdateDepartmentByIdRequest;

/**
 * The departments endpoints of the Classic API, from Jamf::classic()->departments().
 */
class DepartmentsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindDepartmentsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindDepartmentsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateDepartmentByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateDepartmentByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteDepartmentByIdRequest($id);
    }

    /**
     * Creates a new department by id: POST /departments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <department>), or the XML itself.
     */
    public function createDepartmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateDepartmentByIdRequest($id, $record));
    }

    /**
     * Deletes a department by id: DELETE /departments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDepartmentById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDepartmentByIdRequest($id, $options));
    }

    /**
     * Finds all departments: GET /departments.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findDepartments(array $options = []): Collection
    {
        return $this->fetch(new FindDepartmentsRequest($options));
    }

    /**
     * Finds departments by id: GET /departments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDepartmentsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindDepartmentsByIdRequest($id, $options));
    }

    /**
     * Finds departments by name: GET /departments/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDepartmentsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindDepartmentsByNameRequest($name, $options));
    }

    /**
     * Updates an existing department by id: PUT /departments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <department>), or the XML itself.
     */
    public function updateDepartmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateDepartmentByIdRequest($id, $record));
    }
}
