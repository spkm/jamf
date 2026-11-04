<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesByIdRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesByNameRequest;
use spkm\Jamf\Classic\Requests\SavedSearches\FindSavedSearchesRequest;

/**
 * The savedsearches endpoints of the Classic API, from Jamf::classic()->savedSearches().
 */
class SavedSearchesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindSavedSearchesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindSavedSearchesByIdRequest($id);
    }

    /**
     * Finds all saved searches (deprecated). advancedcomputersearches and advancedmobiledevicesearches should be used
     * instead of savedsearches: GET /savedsearches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findSavedSearches(array $options = []): Collection
    {
        return $this->fetch(new FindSavedSearchesRequest($options));
    }

    /**
     * Finds saved searches by id: GET /savedsearches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSavedSearchesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindSavedSearchesByIdRequest($id, $options));
    }

    /**
     * Finds saved searches by name: GET /savedsearches/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findSavedSearchesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindSavedSearchesByNameRequest($name, $options));
    }
}
