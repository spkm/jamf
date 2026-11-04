<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a Patch Software Title by ID (Deprecated): DELETE /patches/id/{id}.
 *
 * You can DELETE using the resource URLs with parameters of {name}.
 */
class DeleteSoftwareTitlesByIdRequest extends ClassicDeleteRequest
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
