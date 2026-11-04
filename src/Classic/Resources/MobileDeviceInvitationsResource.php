<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\CreateMobileDeviceInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\DeleteMobileDeviceInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsByInvitationRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceInvitations\FindMobileDeviceInvitationsRequest;

/**
 * The mobiledeviceinvitations endpoints of the Classic API, from Jamf::classic()->mobileDeviceInvitations().
 */
class MobileDeviceInvitationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceInvitationsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceInvitationsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceInvitationByIdRequest(0, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceInvitationByIdRequest($id);
    }

    /**
     * Creates a new mobile device invitation by id: POST /mobiledeviceinvitations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_invitation>), or the XML itself.
     */
    public function createMobileDeviceInvitationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceInvitationByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device invitation by id: DELETE /mobiledeviceinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceInvitationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceInvitationByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device invitations: GET /mobiledeviceinvitations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceInvitations(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceInvitationsRequest($options));
    }

    /**
     * Finds mobile device invitations by id: GET /mobiledeviceinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceInvitationsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceInvitationsByIdRequest($id, $options));
    }

    /**
     * Finds mobile device invitations by invitation: GET /mobiledeviceinvitations/invitation/{invitation}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceInvitationsByInvitation(string $invitation, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceInvitationsByInvitationRequest($invitation, $options));
    }
}
