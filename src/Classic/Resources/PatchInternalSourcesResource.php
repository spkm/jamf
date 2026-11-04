<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesByNameRequest;
use spkm\Jamf\Classic\Requests\PatchInternalSources\FindPatchInternalSourcesRequest;

/**
 * The patchinternalsources endpoints of the Classic API, from Jamf::classic()->patchInternalSources().
 */
class PatchInternalSourcesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPatchInternalSourcesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPatchInternalSourcesByIdRequest($id);
    }

    /**
     * Finds all patch internal sources: GET /patchinternalsources.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPatchInternalSources(array $options = []): Collection
    {
        return $this->fetch(new FindPatchInternalSourcesRequest($options));
    }

    /**
     * Finds a patch internal source by ID: GET /patchinternalsources/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchInternalSourcesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchInternalSourcesByIdRequest($id, $options));
    }

    /**
     * Finds the first patch internal source with the name provided: GET /patchinternalsources/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchInternalSourcesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPatchInternalSourcesByNameRequest($name, $options));
    }
}
