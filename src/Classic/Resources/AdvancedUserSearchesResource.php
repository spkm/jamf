<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\CreateAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\DeleteAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindAdvancedUserSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindAdvancedUserSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\FindUserSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedUserSearches\UpdateAdvancedUserSearchByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The advancedusersearches endpoints of the Classic API, from Jamf::classic()->advancedUserSearches().
 */
class AdvancedUserSearchesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindAdvancedUserSearchesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAdvancedUserSearchesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAdvancedUserSearchByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateAdvancedUserSearchByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAdvancedUserSearchByIdRequest($id);
    }

    /**
     * Creates a new advanced user search by id: POST /advancedusersearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_user_search>), or the XML itself.
     */
    public function createAdvancedUserSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAdvancedUserSearchByIdRequest($id, $record));
    }

    /**
     * Deletes a user search by id: DELETE /advancedusersearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAdvancedUserSearchById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdvancedUserSearchByIdRequest($id, $options));
    }

    /**
     * Finds all advanced user searches: GET /advancedusersearches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findAdvancedUserSearches(array $options = []): Collection
    {
        return $this->fetch(new FindAdvancedUserSearchesRequest($options));
    }

    /**
     * Finds user searches by id: GET /advancedusersearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAdvancedUserSearchesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAdvancedUserSearchesByIdRequest($id, $options));
    }

    /**
     * Finds user searches by name: GET /advancedusersearches/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findUserSearchesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindUserSearchesByNameRequest($name, $options));
    }

    /**
     * Updates an existing advanced user search by id: PUT /advancedusersearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_user_search>), or the XML itself.
     */
    public function updateAdvancedUserSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateAdvancedUserSearchByIdRequest($id, $record));
    }
}
