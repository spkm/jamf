<?php

namespace spkm\Jamf\Classic\Requests\AllowedFileExtensions;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new allowed file extension value by id: POST /allowedfileextensions/id/{id}.
 */
class CreateAllowedFileExtensionByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'allowed_file_extension';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <allowed_file_extension>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/allowedfileextensions/id/'.Path::segment((string) $this->id);
    }
}
