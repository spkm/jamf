<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\Accounts\CreateGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\CreateUserByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\DeleteGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\DeleteUserByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindAccountsRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindUsersByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\FindUsersByNameRequest;
use spkm\Jamf\Classic\Requests\Accounts\UpdateGroupByIdRequest;
use spkm\Jamf\Classic\Requests\Accounts\UpdateUserByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The accounts endpoints of the Classic API, from Jamf::classic()->accounts().
 */
class AccountsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindAccountsRequest;
    }

    /**
     * Creates a new group by id: POST /accounts/groupid/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <group>), or the XML itself.
     */
    public function createGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateGroupByIdRequest($id, $record));
    }

    /**
     * Creates a new user by id: POST /accounts/userid/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <account>), or the XML itself.
     */
    public function createUserById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateUserByIdRequest($id, $record));
    }

    /**
     * Deletes a group by id: DELETE /accounts/groupid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteGroupById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteGroupByIdRequest($id, $options));
    }

    /**
     * Deletes a user by id: DELETE /accounts/userid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserByIdRequest($id, $options));
    }

    /**
     * Finds all accounts: GET /accounts.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findAccounts(array $options = []): Collection
    {
        return $this->fetch(new FindAccountsRequest($options));
    }

    /**
     * Finds groups by id: GET /accounts/groupid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findGroupsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindGroupsByIdRequest($id, $options));
    }

    /**
     * Finds groups by name: GET /accounts/groupname/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findGroupsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindGroupsByNameRequest($name, $options));
    }

    /**
     * Finds users by id: GET /accounts/userid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUsersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindUsersByIdRequest($id, $options));
    }

    /**
     * Finds users by name: GET /accounts/username/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUsersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindUsersByNameRequest($name, $options));
    }

    /**
     * Updates an existing group by id: PUT /accounts/groupid/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <group>), or the XML itself.
     */
    public function updateGroupById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateGroupByIdRequest($id, $record));
    }

    /**
     * Updates an existing user by id: PUT /accounts/userid/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <account>), or the XML itself.
     */
    public function updateUserById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateUserByIdRequest($id, $record));
    }
}
