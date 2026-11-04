<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\CreateAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\DeleteAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindAdvancedMobileDeviceSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\FindMobileDeviceSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches\UpdateAdvancedMobileDeviceSearchByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The advancedmobiledevicesearches endpoints of the Classic API, from Jamf::classic()->advancedMobileDeviceSearches().
 */
class AdvancedMobileDeviceSearchesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindAdvancedMobileDeviceSearchesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAdvancedMobileDeviceSearchesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAdvancedMobileDeviceSearchByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateAdvancedMobileDeviceSearchByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAdvancedMobileDeviceSearchByIdRequest($id);
    }

    /**
     * Creates a new advanced mobile device search by id: POST /advancedmobiledevicesearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_mobile_device_search>), or the XML itself.
     */
    public function createAdvancedMobileDeviceSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAdvancedMobileDeviceSearchByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device search by id: DELETE /advancedmobiledevicesearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAdvancedMobileDeviceSearchById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdvancedMobileDeviceSearchByIdRequest($id, $options));
    }

    /**
     * Finds all advanced mobile device searches: GET /advancedmobiledevicesearches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findAdvancedMobileDeviceSearches(array $options = []): Collection
    {
        return $this->fetch(new FindAdvancedMobileDeviceSearchesRequest($options));
    }

    /**
     * Finds mobile device searches by id: GET /advancedmobiledevicesearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAdvancedMobileDeviceSearchesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAdvancedMobileDeviceSearchesByIdRequest($id, $options));
    }

    /**
     * Finds mobile device searches by name: GET /advancedmobiledevicesearches/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceSearchesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceSearchesByNameRequest($name, $options));
    }

    /**
     * Updates an existing advanced mobile device search by id: PUT /advancedmobiledevicesearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_mobile_device_search>), or the XML itself.
     */
    public function updateAdvancedMobileDeviceSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateAdvancedMobileDeviceSearchByIdRequest($id, $record));
    }
}
