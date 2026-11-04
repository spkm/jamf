<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds patches by ID (Deprecated): GET /patches/id/{id}.
 */
class FindPatchesByIdRequest extends ClassicGetRequest
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
        return '/patches/id/'.Path::segment((string) $this->id);
    }
}
