<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\UserGroups\CreateUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\DeleteUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsByIdRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsByNameRequest;
use spkm\Jamf\Classic\Requests\UserGroups\FindUserGroupsRequest;
use spkm\Jamf\Classic\Requests\UserGroups\UpdateUserGroupsByIdRequest;

/**
 * The usergroups endpoints of the Classic API, from Jamf::classic()->userGroups().
 */
class UserGroupsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindUserGroupsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindUserGroupsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateUserGroupsByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateUserGroupsByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteUserGroupsByIdRequest($id);
    }

    /**
     * Creates user groups by id: POST /usergroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user_group>), or the XML itself.
     */
    public function createUserGroupsById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateUserGroupsByIdRequest($id, $record));
    }

    /**
     * Deletes user groups by id: DELETE /usergroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserGroupsById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserGroupsByIdRequest($id, $options));
    }

    /**
     * Finds all user groups: GET /usergroups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findUserGroups(array $options = []): Collection
    {
        return $this->fetch(new FindUserGroupsRequest($options));
    }

    /**
     * Finds user groups by id: GET /usergroups/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUserGroupsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindUserGroupsByIdRequest($id, $options));
    }

    /**
     * Finds user groups by name: GET /usergroups/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUserGroupsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindUserGroupsByNameRequest($name, $options));
    }

    /**
     * Updates user groups by id: PUT /usergroups/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user_group>), or the XML itself.
     */
    public function updateUserGroupsById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateUserGroupsByIdRequest($id, $record));
    }
}
