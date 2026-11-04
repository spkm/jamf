<?php

namespace spkm\Jamf\Classic\Requests\PatchSoftwareTitles;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates new patch software title by id: POST /patchsoftwaretitles/id/{id}.
 *
 * While doing a POST the patch source and patch software title nodes are required.
 */
class CreatePatchSoftwareTitleByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'patch_software_title';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <patch_software_title>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patchsoftwaretitles/id/'.Path::segment((string) $this->id);
    }
}
