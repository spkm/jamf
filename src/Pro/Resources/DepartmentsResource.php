<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\Department;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Departments\CreateDepartmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\Departments\CreateDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\DeleteDepartmentV1Request;
use spkm\Jamf\Pro\Requests\Departments\DeleteMultipleDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentHistoryV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentsV1Request;
use spkm\Jamf\Pro\Requests\Departments\GetDepartmentV1Request;
use spkm\Jamf\Pro\Requests\Departments\ReplaceDepartmentV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The departments endpoints of the Jamf Pro API, from Jamf::departments().
 *
 * @extends Builder<Department>
 */
class DepartmentsResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Department::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDepartmentsV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetDepartmentV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateDepartmentsV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceDepartmentV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteDepartmentV1Request($id);
    }

    /**
     * Add specified Department history object notes: POST /v1/departments/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDepartmentHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateDepartmentHistoryV1Request($id, $body, $options));
    }

    /**
     * Create department record: POST /v1/departments.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDepartmentsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateDepartmentsV1Request($body, $options));
    }

    /**
     * Remove specified department record: DELETE /v1/departments/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDepartmentV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDepartmentV1Request($id, $options));
    }

    /**
     * Deletes all departments by ids passed in body: POST /v1/departments/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleDepartmentsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleDepartmentsV1Request($body, $options));
    }

    /**
     * Get specified Department history object: GET /v1/departments/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getDepartmentHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetDepartmentHistoryV1Request($id, $query));
    }

    /**
     * Get specified Department object: GET /v1/departments/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDepartmentV1(int|string $id, array $options = []): ?Department
    {
        return $this->fetch(new GetDepartmentV1Request($id, $options));
    }

    /**
     * Search for Departments: GET /v1/departments.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Department>
     */
    public function getDepartmentsV1(): PagedResource
    {
        return new PagedResource($this->pro(), Department::class, fn (Query $query) => new GetDepartmentsV1Request($query));
    }

    /**
     * Update specified department object: PUT /v1/departments/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDepartmentV1(int|string $id, array|JsonSerializable $body, array $options = []): ?Department
    {
        return $this->fetch(new ReplaceDepartmentV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
