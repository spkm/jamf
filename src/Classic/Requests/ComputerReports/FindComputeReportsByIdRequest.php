<?php

namespace spkm\Jamf\Classic\Requests\ComputerReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer reports by id: GET /computerreports/id/{id}.
 */
class FindComputeReportsByIdRequest extends ClassicGetRequest
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
        return '/computerreports/id/'.Path::segment((string) $this->id);
    }
}
