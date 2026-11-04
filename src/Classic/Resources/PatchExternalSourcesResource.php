<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\CreatePatchExternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesByNameRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\FindPatchExternalSourcesRequest;
use spkm\Jamf\Classic\Requests\PatchExternalSources\UpdatePatchExternalSourcesByIdRequest;

/**
 * The patchexternalsources endpoints of the Classic API, from Jamf::classic()->patchExternalSources().
 */
class PatchExternalSourcesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPatchExternalSourcesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPatchExternalSourcesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePatchExternalSourcesByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePatchExternalSourcesByIdRequest($id, $record);
    }

    /**
     * Create a new patch external source by Id: POST /patchexternalsources/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_external_source>), or the XML itself.
     */
    public function createPatchExternalSourcesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePatchExternalSourcesByIdRequest($id, $record));
    }

    /**
     * Finds all patch external sources: GET /patchexternalsources.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPatchExternalSources(array $options = []): Collection
    {
        return $this->fetch(new FindPatchExternalSourcesRequest($options));
    }

    /**
     * Finds a patch external source by Id: GET /patchexternalsources/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchExternalSourcesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchExternalSourcesByIdRequest($id, $options));
    }

    /**
     * Finds the first patch external source with the name provided: GET /patchexternalsources/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchExternalSourcesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPatchExternalSourcesByNameRequest($name, $options));
    }

    /**
     * Updates a patch external source by Id: PUT /patchexternalsources/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_external_source>), or the XML itself.
     */
    public function updatePatchExternalSourcesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePatchExternalSourcesByIdRequest($id, $record));
    }
}
