<?php

namespace spkm\Jamf\Classic\Requests\PatchReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds patch reports by patch software title id: GET /patchreports/patchsoftwaretitleid/{id}.
 */
class FindPatchReportsByPatchSoftwareTitleIdRequest extends ClassicGetRequest
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
        return '/patchreports/patchsoftwaretitleid/'.Path::segment((string) $this->id);
    }
}
