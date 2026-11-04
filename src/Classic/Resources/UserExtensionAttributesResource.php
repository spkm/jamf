<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\CreateUserextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\DeleteUserextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\FindUserextensionattributesRequest;
use spkm\Jamf\Classic\Requests\UserExtensionAttributes\UpdateUserextensionattributeByIdRequest;

/**
 * The userextensionattributes endpoints of the Classic API, from Jamf::classic()->userExtensionAttributes().
 */
class UserExtensionAttributesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindUserextensionattributesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindUserextensionattributesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateUserextensionattributeByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateUserextensionattributeByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteUserextensionattributeByIdRequest($id);
    }

    /**
     * Creates a new user extension attribute by id: POST /userextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user_extension_attribute>), or the XML itself.
     */
    public function createUserextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateUserextensionattributeByIdRequest($id, $record));
    }

    /**
     * Deletes a user extension attribute by id: DELETE /userextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserextensionattributeById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteUserextensionattributeByIdRequest($id, $options));
    }

    /**
     * Finds all user extension attributes: GET /userextensionattributes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findUserextensionattributes(array $options = []): Collection
    {
        return $this->fetch(new FindUserextensionattributesRequest($options));
    }

    /**
     * Finds user extension attributes by id: GET /userextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUserextensionattributesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindUserextensionattributesByIdRequest($id, $options));
    }

    /**
     * Finds user extension attributes by name: GET /userextensionattributes/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUserextensionattributesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindUserextensionattributesByNameRequest($name, $options));
    }

    /**
     * Updates an existing user extension attribute by id: PUT /userextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <user_extension_attribute>), or the XML itself.
     */
    public function updateUserextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateUserextensionattributeByIdRequest($id, $record));
    }
}
