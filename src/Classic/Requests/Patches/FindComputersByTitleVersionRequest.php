<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display computers on a specific version (Deprecated): GET /patches/id/{id}/version/{version}.
 *
 * Displays information specified with the {version} parameter for a patch specified with the {id} parameter. Lookup
 * by name is also supported. For example, /patches/id/3/version/45.0.2 or /patches/name/Mozilla
 * Firefox/version/45.0.2. A version number of 'Latest' and 'Unknown' will also work.
 */
class FindComputersByTitleVersionRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $version, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/patches/id/'.Path::segment((string) $this->id).'/version/'.Path::segment((string) $this->version);
    }
}
