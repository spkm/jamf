<?php

namespace spkm\Jamf\Classic\Requests\PatchSoftwareTitles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds patch software titles by id: GET /patchsoftwaretitles/id/{id}.
 */
class FindPatchSoftwareTitlesByIdRequest extends ClassicGetRequest
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
