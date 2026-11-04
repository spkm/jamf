<?php

namespace spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds hardware/software reports by computer name: GET /computerhardwaresoftwarereports/name/{name}/{start_date}_{end_date}.
 *
 * Displays hardware/software reports for the date range specified for a computer specified with the {name} parameter.
 * Date range must be specified in format yyyy-mm-dd. For example,
 * ../JSSResource/computerhardwaresoftwarereports/name/XYZ123/2016-01-01_2016-12-31
 */
class FindComputerHardwareSoftwareReportsByNameRequest extends ClassicGetRequest
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
        return '/computerhardwaresoftwarereports/name/'.Path::segment((string) $this->name).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate);
    }
}
