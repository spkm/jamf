<?php

namespace spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for computer hardware/software history: GET /computerhardwaresoftwarereports/id/{id}/{start_date}_{end_date}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a computer specified with the {id} parameter. Lookup
 * by name, UDID, serial number, or mac address are also supported. Start and end date are required. For example,
 * /computerhardwaresoftwarereports/id/3/2016-01-01_2016-12-31/subset/Software or
 * /computerhardwaresoftwarereports/id/3/2016-01-01_2016-12-31/subset/Fonts&Plugins.
 */
class FindComputerHistoryByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $startDate, protected string $endDate, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhardwaresoftwarereports/id/'.Path::segment((string) $this->id).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate).'/subset/'.Path::segment((string) $this->subset);
    }
}
