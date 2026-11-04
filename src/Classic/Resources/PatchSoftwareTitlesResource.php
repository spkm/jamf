<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\CreatePatchSoftwareTitleByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\DeletePatchSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\FindPatchSoftwareTitlesByIdRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\FindPatchSoftwareTitlesRequest;
use spkm\Jamf\Classic\Requests\PatchSoftwareTitles\UpdatePatchSoftwareTitlesByIdRequest;

/**
 * The patchsoftwaretitles endpoints of the Classic API, from Jamf::classic()->patchSoftwareTitles().
 */
class PatchSoftwareTitlesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPatchSoftwareTitlesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPatchSoftwareTitlesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePatchSoftwareTitleByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePatchSoftwareTitlesByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePatchSoftwareTitlesByIdRequest($id);
    }

    /**
     * Creates new patch software title by id: POST /patchsoftwaretitles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_software_title>), or the XML itself.
     */
    public function createPatchSoftwareTitleById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePatchSoftwareTitleByIdRequest($id, $record));
    }

    /**
     * Deletes a patch software title by id: DELETE /patchsoftwaretitles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchSoftwareTitlesById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchSoftwareTitlesByIdRequest($id, $options));
    }

    /**
     * Finds all patch software titles: GET /patchsoftwaretitles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPatchSoftwareTitles(array $options = []): Collection
    {
        return $this->fetch(new FindPatchSoftwareTitlesRequest($options));
    }

    /**
     * Finds patch software titles by id: GET /patchsoftwaretitles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchSoftwareTitlesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchSoftwareTitlesByIdRequest($id, $options));
    }

    /**
     * Updates a patch software title by id: PUT /patchsoftwaretitles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_software_title>), or the XML itself.
     */
    public function updatePatchSoftwareTitlesById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePatchSoftwareTitlesByIdRequest($id, $record));
    }
}
