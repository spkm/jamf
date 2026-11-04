<?php

namespace spkm\Jamf\Classic\Requests\PatchSoftwareTitles;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a patch software title by id: DELETE /patchsoftwaretitles/id/{id}.
 *
 * You can DELETE using the resource URLs with parameters of {name}.
 */
class DeletePatchSoftwareTitlesByIdRequest extends ClassicDeleteRequest
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
        return '/patchsoftwaretitles/id/'.Path::segment((string) $this->id);
    }
}
