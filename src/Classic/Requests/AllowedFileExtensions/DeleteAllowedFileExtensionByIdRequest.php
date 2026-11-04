<?php

namespace spkm\Jamf\Classic\Requests\AllowedFileExtensions;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes an allowed file extension value by id: DELETE /allowedfileextensions/id/{id}.
 */
class DeleteAllowedFileExtensionByIdRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/allowedfileextensions/id/'.Path::segment((string) $this->id);
    }
}
