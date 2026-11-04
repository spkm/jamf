<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\CreateMobileDeviceProvisioningProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\DeleteMobileDeviceProvisioningProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfileByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesByUUIDRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\FindMobileDeviceProvisioningProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles\UpdateMobileDeviceProvisioningProfileByIdRequest;

/**
 * The mobiledeviceprovisioningprofiles endpoints of the Classic API, from Jamf::classic()->mobileDeviceProvisioningProfiles().
 */
class MobileDeviceProvisioningProfilesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceProvisioningProfilesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceProvisioningProfilesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceProvisioningProfileByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceProvisioningProfileByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceProvisioningProfileByIdRequest($id);
    }

    /**
     * Creates a new mobile device provisioning profile by id: POST /mobiledeviceprovisioningprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_provisioning_profile>), or the XML itself.
     */
    public function createMobileDeviceProvisioningProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceProvisioningProfileByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device provisioning profile by id: DELETE /mobiledeviceprovisioningprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceProvisioningProfileById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceProvisioningProfileByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a mobile device provisioning profile: GET
     * /mobiledeviceprovisioningprofiles/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceProvisioningProfileByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceProvisioningProfileByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds all mobile device provisioning profiles: GET /mobiledeviceprovisioningprofiles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceProvisioningProfiles(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceProvisioningProfilesRequest($options));
    }

    /**
     * Finds mobile device provisioning profiles by id: GET /mobiledeviceprovisioningprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceProvisioningProfilesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceProvisioningProfilesByIdRequest($id, $options));
    }

    /**
     * Finds mobile device provisioning profiles by name: GET /mobiledeviceprovisioningprofiles/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceProvisioningProfilesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceProvisioningProfilesByNameRequest($name, $options));
    }

    /**
     * Finds mobile device provisioning profiles by uuid: GET /mobiledeviceprovisioningprofiles/uuid/{uuid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceProvisioningProfilesByUUID(string $uuid, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceProvisioningProfilesByUUIDRequest($uuid, $options));
    }

    /**
     * Updates an existing mobile device provisioning profile by id: PUT /mobiledeviceprovisioningprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_provisioning_profile>), or the XML itself.
     */
    public function updateMobileDeviceProvisioningProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceProvisioningProfileByIdRequest($id, $record));
    }
}
