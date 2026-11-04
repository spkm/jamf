<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates new patches by ID (Deprecated): POST /patches/id/{id}.
 */
class CreatePatchesByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'software_title';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <software_title>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patches/id/'.Path::segment((string) $this->id);
    }
}
