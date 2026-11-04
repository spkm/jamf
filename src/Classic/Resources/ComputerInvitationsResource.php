<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\CreateComputerInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\DeleteComputerInvitationByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByInvitationRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerInvitations\FindComputerInvitationsRequest;

/**
 * The computerinvitations endpoints of the Classic API, from Jamf::classic()->computerInvitations().
 */
class ComputerInvitationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerInvitationsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindComputerInvitationsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateComputerInvitationByIdRequest(0, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteComputerInvitationByIdRequest($id);
    }

    /**
     * Creates a new computer invitation by id: POST /computerinvitations/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_invitation>), or the XML itself.
     */
    public function createComputerInvitationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerInvitationByIdRequest($id, $record));
    }

    /**
     * Deletes a computer invitation by id: DELETE /computerinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerInvitationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerInvitationByIdRequest($id, $options));
    }

    /**
     * Finds all computer invitations: GET /computerinvitations.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerInvitations(array $options = []): Collection
    {
        return $this->fetch(new FindComputerInvitationsRequest($options));
    }

    /**
     * Finds computer invitations by id: GET /computerinvitations/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerInvitationsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputerInvitationsByIdRequest($id, $options));
    }

    /**
     * Finds computer invitations by invitation: GET /computerinvitations/invitation/{invitation}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerInvitationsByInvitation(string $invitation, array $options = []): mixed
    {
        return $this->fetch(new FindComputerInvitationsByInvitationRequest($invitation, $options));
    }

    /**
     * Finds computer invitations by name: GET /computerinvitations/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerInvitationsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerInvitationsByNameRequest($name, $options));
    }
}
