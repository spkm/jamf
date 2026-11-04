<?php

namespace spkm\Jamf\Classic\Requests\PatchReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display computers for a specific version of a patch report: GET /patchreports/patchsoftwaretitleid/{id}/version/{version}.
 *
 * Displays report information specified with the {version} parameter for a patch software title specified with the
 * {id} parameter. Lookup by name is not support due to the ability for software titles from different sources to
 * share a common name. For example, /patches/id/3/version/45.0.2. A version number of 'Latest' and 'Unknown' will
 * also work.
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
        return '/patchreports/patchsoftwaretitleid/'.Path::segment((string) $this->id).'/version/'.Path::segment((string) $this->version);
    }
}
