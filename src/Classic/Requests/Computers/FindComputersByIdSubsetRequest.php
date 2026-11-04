<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a computer: GET /computers/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a computer specified with the {id} parameter. Lookup
 * by name, UDID, serial number, or mac address are also supported. For example,
 * /computers/id/3/subset/General&Location&Purchasing or /computers/name/MyComputer/subset/General.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class FindComputersByIdSubsetRequest extends ClassicGetRequest
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
        return '/computers/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
