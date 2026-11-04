<?php

namespace spkm\Jamf\Classic\Requests\PatchAvailableTitles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all available title from a source by Id: GET /patchavailabletitles/sourceid/{id}.
 */
class FindAvailableTitlesBySourceIdRequest extends ClassicGetRequest
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
        return '/patchavailabletitles/sourceid/'.Path::segment((string) $this->id);
    }
}
