<?php

namespace spkm\Jamf\Classic\Requests\PatchExternalSources;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds a patch external source by Id: GET /patchexternalsources/id/{id}.
 */
class FindPatchExternalSourcesByIdRequest extends ClassicGetRequest
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
        return '/patchexternalsources/id/'.Path::segment((string) $this->id);
    }
}
