<?php

namespace spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds hardware/software reports by computer UDID: GET /computerhardwaresoftwarereports/udid/{udid}/{start_date}_{end_date}.
 *
 * Displays hardware/software reports for the date range specified for a computer specified with the {udid} parameter.
 * Date range must be specified in format yyyy-mm-dd. For example,
 * ../JSSResource/computerhardwaresoftwarereports/udid/ABC1FE75-144A-5F66-944B-8D37B6CFABCD/2016-01-01_2016-12-31
 */
class FindComputerHardwareSoftwareReportsByUDIDRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $udid, protected string $startDate, protected string $endDate, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhardwaresoftwarereports/udid/'.Path::segment((string) $this->udid).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate);
    }
}
