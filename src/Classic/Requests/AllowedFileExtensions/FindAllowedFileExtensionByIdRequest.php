<?php

namespace spkm\Jamf\Classic\Requests\AllowedFileExtensions;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds an allowed file extension value by id: GET /allowedfileextensions/id/{id}.
 */
class FindAllowedFileExtensionByIdRequest extends ClassicGetRequest
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
