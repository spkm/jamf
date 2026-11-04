<?php

namespace spkm\Jamf\Classic\Requests\PatchExternalSources;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Create a new patch external source by Id: POST /patchexternalsources/id/{id}.
 */
class CreatePatchExternalSourcesByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'patch_external_source';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <patch_external_source>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patchexternalsources/id/'.Path::segment((string) $this->id);
    }
}
