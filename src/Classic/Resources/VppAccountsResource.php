<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\CreateAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\DeleteAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\FindAccountByIdRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\FindVPPAdminAccountRequest;
use spkm\Jamf\Classic\Requests\VppAccounts\UpdateAccountByIdRequest;

/**
 * The vppaccounts endpoints of the Classic API, from Jamf::classic()->vppAccounts().
 */
class VppAccountsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindVPPAdminAccountRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAccountByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAccountByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateAccountByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAccountByIdRequest($id);
    }

    /**
     * Creates a new vpp account by id: POST /vppaccounts/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_account>), or the XML itself.
     */
    public function createAccountById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAccountByIdRequest($id, $record));
    }

    /**
     * Deletes a vpp account by id: DELETE /vppaccounts/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAccountById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAccountByIdRequest($id, $options));
    }

    /**
     * Finds VPP Account by id: GET /vppaccounts/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAccountById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAccountByIdRequest($id, $options));
    }

    /**
     * Finds all VPP Accounts: GET /vppaccounts.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findVPPAdminAccount(array $options = []): Collection
    {
        return $this->fetch(new FindVPPAdminAccountRequest($options));
    }

    /**
     * Updates a vpp account by id: PUT /vppaccounts/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <vpp_account>), or the XML itself.
     */
    public function updateAccountById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateAccountByIdRequest($id, $record));
    }
}
