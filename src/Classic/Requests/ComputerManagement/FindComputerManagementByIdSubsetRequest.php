<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of management information for a computer: GET /computermanagement/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a computer specified with the {id} parameter. Lookup
 * by name, UDID, serial number, or mac address are also supported. For example,
 * /computermanagement/id/3/subset/General&Policies&Restricted_Software or
 * /computermanagement/id/3/subset/General&EBooks or /computermanagement/name/MyComputer/subset/General. Computer
 * command information is available in computerhistory.
 */
class FindComputerManagementByIdSubsetRequest extends ClassicGetRequest
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
        return '/computermanagement/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
