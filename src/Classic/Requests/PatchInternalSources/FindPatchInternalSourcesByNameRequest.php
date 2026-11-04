<?php

namespace spkm\Jamf\Classic\Requests\PatchInternalSources;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds the first patch internal source with the name provided: GET /patchinternalsources/name/{name}.
 */
class FindPatchInternalSourcesByNameRequest extends ClassicGetRequest
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
        return '/patchinternalsources/name/'.Path::segment((string) $this->name);
    }
}
