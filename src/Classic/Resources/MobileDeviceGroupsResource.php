<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\CreateMobileDeviceGroupByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\DeleteMobileDeviceGroupByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\FindMobileDeviceGroupsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceGroups\UpdateMobileDeviceGroupByIdRequest;

/**
 * The mobiledevicegroups endpoints of the Classic API, from Jamf::classic()->mobileDeviceGroups().
 */
class MobileDeviceGroupsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceGroupsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceGroupsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceGroupByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceGroupByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceGroupByIdRequest($id);
    }

    /**
     * Creates a new mobile device group by id: POST /mobiledevicegroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_group>), or the XML itself.
     */
    public function createMobileDeviceGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceGroupByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device group by id: DELETE /mobiledevicegroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceGroupById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceGroupByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device groups: GET /mobiledevicegroups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceGroups(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceGroupsRequest($options));
    }

    /**
     * Finds mobile device groups by id: GET /mobiledevicegroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceGroupsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceGroupsByIdRequest($id, $options));
    }

    /**
     * Finds mobile device groups by name: GET /mobiledevicegroups/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceGroupsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceGroupsByNameRequest($name, $options));
    }

    /**
     * Updates an existing mobile device group by id: PUT /mobiledevicegroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_group>), or the XML itself.
     */
    public function updateMobileDeviceGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceGroupByIdRequest($id, $record));
    }
}
