<?php

namespace spkm\Jamf\Classic\Requests\ComputerApplicationUsage;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer application usage by computer id: GET /computerapplicationusage/id/{id}/{start_date}_{end_date}.
 *
 * Displays application usage information for the date range specified for a computer specified with the {id}
 * parameter. Date range must be specified in format yyyy-mm-dd. For example,
 * ../JSSResource/computerapplicationusage/id/33/2016-01-01_2016-12-31
 */
class FindComputerApplicationUsageByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $startDate, protected string $endDate, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerapplicationusage/id/'.Path::segment((string) $this->id).'/'.Path::segment((string) $this->startDate).'_'.Path::segment((string) $this->endDate);
    }
}
