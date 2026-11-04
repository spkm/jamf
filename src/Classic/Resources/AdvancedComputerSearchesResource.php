<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\CreateAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\DeleteAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindAdvancedComputerSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindAdvancedComputerSearchesRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\FindComputerSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\AdvancedComputerSearches\UpdateAdvancedComputerSearchByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The advancedcomputersearches endpoints of the Classic API, from Jamf::classic()->advancedComputerSearches().
 */
class AdvancedComputerSearchesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindAdvancedComputerSearchesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindAdvancedComputerSearchesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateAdvancedComputerSearchByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateAdvancedComputerSearchByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteAdvancedComputerSearchByIdRequest($id);
    }

    /**
     * Creates a new advanced computer search by id: POST /advancedcomputersearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_computer_search>), or the XML itself.
     */
    public function createAdvancedComputerSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateAdvancedComputerSearchByIdRequest($id, $record));
    }

    /**
     * Deletes a computer search by id: DELETE /advancedcomputersearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteAdvancedComputerSearchById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteAdvancedComputerSearchByIdRequest($id, $options));
    }

    /**
     * Finds all advanced computer searches: GET /advancedcomputersearches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findAdvancedComputerSearches(array $options = []): Collection
    {
        return $this->fetch(new FindAdvancedComputerSearchesRequest($options));
    }

    /**
     * Finds computer searches by id: GET /advancedcomputersearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAdvancedComputerSearchesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAdvancedComputerSearchesByIdRequest($id, $options));
    }

    /**
     * Finds computer searches by name: GET /advancedcomputersearches/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerSearchesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerSearchesByNameRequest($name, $options));
    }

    /**
     * Updates an existing advanced computer search by id: PUT /advancedcomputersearches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <advanced_computer_search>), or the XML itself.
     */
    public function updateAdvancedComputerSearchById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateAdvancedComputerSearchByIdRequest($id, $record));
    }
}
