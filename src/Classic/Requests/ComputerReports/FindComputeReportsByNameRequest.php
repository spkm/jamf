<?php

namespace spkm\Jamf\Classic\Requests\ComputerReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer reports by name: GET /computerreports/name/{name}.
 */
class FindComputeReportsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerreports/name/'.Path::segment((string) $this->name);
    }
}
