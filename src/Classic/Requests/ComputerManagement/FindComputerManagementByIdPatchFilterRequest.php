<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display patch management information for a computer and filter: GET /computermanagement/id/{id}/patchfilter/{filter}.
 *
 * Displays information for a computer specified with the {id} and {filter} parameters. Lookup by name, UDID, serial
 * number, or mac address are also supported. For example, /computermanagement/id/3/patchfilter/Chrome. Only patch
 * information is shown.
 */
class FindComputerManagementByIdPatchFilterRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $filter, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computermanagement/id/'.Path::segment((string) $this->id).'/patchfilter/'.Path::segment((string) $this->filter);
    }
}
