<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\User;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Users\CreateUsersV1Request;
use spkm\Jamf\Pro\Requests\Users\DeleteUserV1Request;
use spkm\Jamf\Pro\Requests\Users\GetUsersV1Request;
use spkm\Jamf\Pro\Requests\Users\GetUserV1Request;
use spkm\Jamf\Pro\Requests\Users\ReplaceUserV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The users endpoints of the Jamf Pro API, from Jamf::users().
 *
 * @extends Builder<User>
 */
class UsersResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, User::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetUsersV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetUserV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateUsersV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceUserV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteUserV1Request($id);
    }

    /**
     * Create a new user in inventory: POST /v1/users.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function createUsersV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateUsersV1Request($body, $options));
    }

    /**
     * Delete a user from inventory: DELETE /v1/users/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserV1Request($id, $options));
    }

    /**
     * Retrieve a user by ID: GET /v1/users/{id}.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function getUserV1(int|string $id, array $options = []): ?User
    {
        return $this->fetch(new GetUserV1Request($id, $options));
    }

    /**
     * Retrieve users with pagination and filtering: GET /v1/users.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<User>
     */
    public function getUsersV1(): PagedResource
    {
        return new PagedResource($this->pro(), User::class, fn (Query $query) => new GetUsersV1Request($query));
    }

    /**
     * Update a user in inventory: PUT /v1/users/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceUserV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReplaceUserV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
