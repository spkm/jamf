<?php

namespace spkm\Jamf\Classic\Requests\AllowedFileExtensions;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds an allowed file extension value by name: GET /allowedfileextensions/extension/{extension}.
 */
class FindAllowedFileExtensionByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $extension, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/allowedfileextensions/extension/'.Path::segment((string) $this->extension);
    }
}
