<?php

namespace spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds hardware/software reports by computer serial number: GET /computerhardwaresoftwarereports/serialnumber/{serialnumber}/{start_date}_{end_date}.
 *
 * Displays hardware/software reports for the date range specified for a computer specified with the {serialnumber}
 * parameter. Date range must be specified in format yyyy-mm-dd. For example,
 * ../JSSResource/computerhardwaresoftwarereports/serialnumber/C0Q10E7KDKQ1/2016-01-01_2016-12-31
 */
class FindComputerHardwareSoftwareReportsBySerialRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $serialnumber, protected string $startDate, protected string $endDate, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhardwaresoftwarereports/serialnumber/'.Path::segment((string) $this->serialnumber).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate);
    }
}
