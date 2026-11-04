<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\CreateMobileDeviceConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\DeleteMobileDeviceConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\FindMobileDeviceConfigurationProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles\UpdateMobileDeviceConfigurationProfileByIdRequest;

/**
 * The mobiledeviceconfigurationprofiles endpoints of the Classic API, from Jamf::classic()->mobileDeviceConfigurationProfiles().
 */
class MobileDeviceConfigurationProfilesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceConfigurationProfilesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceConfigurationProfilesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceConfigurationProfileByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceConfigurationProfileByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceConfigurationProfileByIdRequest($id);
    }

    /**
     * Creates a new mobile device configuration profile by id: POST /mobiledeviceconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <configuration_profile>), or the XML itself.
     */
    public function createMobileDeviceConfigurationProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceConfigurationProfileByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device configuration profile by id: DELETE /mobiledeviceconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceConfigurationProfileById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceConfigurationProfileByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device configuration profiles: GET /mobiledeviceconfigurationprofiles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceConfigurationProfiles(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceConfigurationProfilesRequest($options));
    }

    /**
     * Finds mobile device configuration profiles by id: GET /mobiledeviceconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceConfigurationProfilesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceConfigurationProfilesByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a mobile device configuration profile: GET
     * /mobiledeviceconfigurationprofiles/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceConfigurationProfilesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceConfigurationProfilesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds mobile device configuration profiles by name: GET /mobiledeviceconfigurationprofiles/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceConfigurationProfilesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceConfigurationProfilesByNameRequest($name, $options));
    }

    /**
     * Updates an existing mobile device configuration profile by id: PUT /mobiledeviceconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <configuration_profile>), or the XML itself.
     */
    public function updateMobileDeviceConfigurationProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceConfigurationProfileByIdRequest($id, $record));
    }
}
