<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MacApplications\CreateMacappByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\DeleteMacappByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByIdRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsByNameRequest;
use spkm\Jamf\Classic\Requests\MacApplications\FindMacappsRequest;
use spkm\Jamf\Classic\Requests\MacApplications\UpdateMacappByIdRequest;

/**
 * The macapplications endpoints of the Classic API, from Jamf::classic()->macApplications().
 */
class MacApplicationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMacappsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMacappsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMacappByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMacappByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMacappByIdRequest($id);
    }

    /**
     * Creates a new mac application by id: POST /macapplications/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mac_application>), or the XML itself.
     */
    public function createMacappById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMacappByIdRequest($id, $record));
    }

    /**
     * Deletes a mac application by id: DELETE /macapplications/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMacappById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMacappByIdRequest($id, $options));
    }

    /**
     * Finds all mac applications: GET /macapplications.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMacapps(array $options = []): Collection
    {
        return $this->fetch(new FindMacappsRequest($options));
    }

    /**
     * Finds mac applications by id: GET /macapplications/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMacappsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMacappsByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a mac application: GET /macapplications/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMacappsByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMacappsByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds mac applications by name: GET /macapplications/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMacappsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMacappsByNameRequest($name, $options));
    }

    /**
     * Updates an existing mac application by id: PUT /macapplications/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mac_application>), or the XML itself.
     */
    public function updateMacappById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMacappByIdRequest($id, $record));
    }
}
