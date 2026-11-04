<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Users\CreateUserByIdRequest;
use spkm\Jamf\Classic\Requests\Users\DeleteUserByIdRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByEmailAddressRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByIdRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersByNameRequest;
use spkm\Jamf\Classic\Requests\Users\FindUsersRequest;
use spkm\Jamf\Classic\Requests\Users\UpdateUserByIdRequest;

/**
 * The users endpoints of the Classic API, from Jamf::classic()->users().
 */
class UsersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindUsersRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindUsersByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateUserByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateUserByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteUserByIdRequest($id);
    }

    /**
     * Creates a new user by id: POST /users/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user>), or the XML itself.
     */
    public function createUserById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateUserByIdRequest($id, $record));
    }

    /**
     * Deletes a user by id: DELETE /users/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserByIdRequest($id, $options));
    }

    /**
     * Finds all users: GET /users.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findUsers(array $options = []): Collection
    {
        return $this->fetch(new FindUsersRequest($options));
    }

    /**
     * Finds users by email address: GET /users/email/{email}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUsersByEmailAddress(string $email, array $options = []): mixed
    {
        return $this->fetch(new FindUsersByEmailAddressRequest($email, $options));
    }

    /**
     * Finds users by id: GET /users/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUsersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindUsersByIdRequest($id, $options));
    }

    /**
     * Finds users by name: GET /users/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUsersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindUsersByNameRequest($name, $options));
    }

    /**
     * Updates an existing user by id: PUT /users/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user>), or the XML itself.
     */
    public function updateUserById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateUserByIdRequest($id, $record));
    }
}
