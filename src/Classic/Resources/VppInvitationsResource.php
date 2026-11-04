<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\CreateInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\DeleteInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindInvitationsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\FindVPPAdminInvitationRequest;
use spkm\Jamf\Classic\Requests\VppInvitations\UpdateInvitationByIdRequest;

/**
 * The vppinvitations endpoints of the Classic API, from Jamf::classic()->vppInvitations().
 */
class VppInvitationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindVPPAdminInvitationRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindInvitationByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateInvitationByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateInvitationByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteInvitationByIdRequest($id);
    }

    /**
     * Creates a new vpp invitation by id: POST /vppinvitations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_invitation>), or the XML itself.
     */
    public function createInvitationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateInvitationByIdRequest($id, $record));
    }

    /**
     * Deletes a vpp invitation by id: DELETE /vppinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteInvitationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteInvitationByIdRequest($id, $options));
    }

    /**
     * Finds VPP Invitation by id: GET /vppinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findInvitationById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindInvitationByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a VPP invitation: GET /vppinvitations/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findInvitationsByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindInvitationsByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds all VPP Invitations: GET /vppinvitations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findVPPAdminInvitation(array $options = []): Collection
    {
        return $this->fetch(new FindVPPAdminInvitationRequest($options));
    }

    /**
     * Updates a vpp invitation by id: PUT /vppinvitations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_invitation>), or the XML itself.
     */
    public function updateInvitationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateInvitationByIdRequest($id, $record));
    }
}
