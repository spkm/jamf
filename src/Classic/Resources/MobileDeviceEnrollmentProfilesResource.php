<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\CreateMobileDeviceEnrollmentProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\DeleteMobileDeviceEnrollmentProfileByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByInvitationRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\FindMobileDeviceEnrollmentProfilesRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles\UpdateMobileDeviceEnrollmentProfileByIdRequest;

/**
 * The mobiledeviceenrollmentprofiles endpoints of the Classic API, from Jamf::classic()->mobileDeviceEnrollmentProfiles().
 */
class MobileDeviceEnrollmentProfilesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceEnrollmentProfilesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceEnrollmentProfilesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceEnrollmentProfilesByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceEnrollmentProfileByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceEnrollmentProfileByIdRequest($id);
    }

    /**
     * Creates a new mobile device enrollment profile by id: POST /mobiledeviceenrollmentprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_enrollment_profile>), or the XML itself.
     */
    public function createMobileDeviceEnrollmentProfilesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceEnrollmentProfilesByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device enrollment profile by id: DELETE /mobiledeviceenrollmentprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceEnrollmentProfileById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceEnrollmentProfileByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device enrollment profiles: GET /mobiledeviceenrollmentprofiles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceEnrollmentProfiles(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceEnrollmentProfilesRequest($options));
    }

    /**
     * Finds mobile device enrollment profiles by id: GET /mobiledeviceenrollmentprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceEnrollmentProfilesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceEnrollmentProfilesByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for an enrollment profile: GET
     * /mobiledeviceenrollmentprofiles/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceEnrollmentProfilesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceEnrollmentProfilesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds mobile device enrollment profiles by invitation: GET /mobiledeviceenrollmentprofiles/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceEnrollmentProfilesByInvitation(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceEnrollmentProfilesByInvitationRequest($name, $options));
    }

    /**
     * Finds mobile device enrollment profiles by invitation: GET
     * /mobiledeviceenrollmentprofiles/invitation/{invitation}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceEnrollmentProfilesByName(string $invitation, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceEnrollmentProfilesByNameRequest($invitation, $options));
    }

    /**
     * Updates an existing mobile device enrollment profile by id: PUT /mobiledeviceenrollmentprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_enrollment_profile>), or the XML itself.
     */
    public function updateMobileDeviceEnrollmentProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceEnrollmentProfileByIdRequest($id, $record));
    }
}
