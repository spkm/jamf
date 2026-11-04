<?php

namespace spkm\Jamf\Classic\Requests\ComputerApplicationUsage;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer application usage by computer name: GET /computerapplicationusage/name/{name}/{start_date}_{end_date}.
 *
 * Displays application usage information for the date range specified for a computer specified with the {name}
 * parameter. Date range must be specified in format yyyy-mm-dd. For example,
 * ../JSSResource/computerapplicationusage/name/XYZ123/2016-01-01_2016-12-31
 */
class FindComputerApplicationUsageByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, protected string $startDate, protected string $endDate, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerapplicationusage/name/'.Path::segment((string) $this->name).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate);
    }
}
