<?php

namespace spkm\Jamf\Classic\Requests\PatchExternalSources;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds the first patch external source with the name provided: GET /patchexternalsources/name/{name}.
 *
 * You can PUT, POST using this resource URL.
 */
class FindPatchExternalSourcesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/patchexternalsources/name/'.Path::segment((string) $this->name);
    }
}
