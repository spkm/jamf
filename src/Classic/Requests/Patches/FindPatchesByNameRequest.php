<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds the first patch with the name provided (Deprecated): GET /patches/name/{name}.
 */
class FindPatchesByNameRequest extends ClassicGetRequest
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
        return '/patches/name/'.Path::segment((string) $this->name);
    }
}
