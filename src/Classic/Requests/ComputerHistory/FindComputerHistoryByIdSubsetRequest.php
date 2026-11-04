<?php

namespace spkm\Jamf\Classic\Requests\ComputerHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a computer history: GET /computerhistory/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a computer specified with the {id} parameter. Lookup
 * by name, UDID, serial number, or mac address are also supported. For example,
 * /computerhistory/id/3/subset/General&UserLocation&Audits or /computerhistory/id/3/subset/General&Audits or
 * /computerhistory/name/MyComputer/subset/General.
 */
class FindComputerHistoryByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhistory/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
