<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Patches\CreatePatchesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\DeleteSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\FindComputersByTitleVersionRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesByIdRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesByNameRequest;
use spkm\Jamf\Classic\Requests\Patches\FindPatchesRequest;
use spkm\Jamf\Classic\Requests\Patches\UpdateSoftwareTitlesByIdRequest;

/**
 * The patches endpoints of the Classic API, from Jamf::classic()->patches().
 */
class PatchesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPatchesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPatchesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePatchesByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateSoftwareTitlesByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteSoftwareTitlesByIdRequest($id);
    }

    /**
     * Creates new patches by ID (Deprecated): POST /patches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <software_title>), or the XML itself.
     */
    public function createPatchesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePatchesByIdRequest($id, $record));
    }

    /**
     * Deletes a Patch Software Title by ID (Deprecated): DELETE /patches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSoftwareTitlesById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSoftwareTitlesByIdRequest($id, $options));
    }

    /**
     * Display computers on a specific version (Deprecated): GET /patches/id/{id}/version/{version}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputersByTitleVersion(int|string $id, string $version, array $options = []): mixed
    {
        return $this->fetch(new FindComputersByTitleVersionRequest($id, $version, $options));
    }

    /**
     * Finds all patches (Deprecated): GET /patches.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPatches(array $options = []): Collection
    {
        return $this->fetch(new FindPatchesRequest($options));
    }

    /**
     * Finds patches by ID (Deprecated): GET /patches/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchesByIdRequest($id, $options));
    }

    /**
     * Finds the first patch with the name provided (Deprecated): GET /patches/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPatchesByNameRequest($name, $options));
    }

    /**
     * Updates a Patch Software Title by ID (Deprecated): PUT /patches/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <software_title>), or the XML itself.
     */
    public function updateSoftwareTitlesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateSoftwareTitlesByIdRequest($id, $record));
    }
}
