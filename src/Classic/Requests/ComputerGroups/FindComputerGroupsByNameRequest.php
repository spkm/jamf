<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer groups by name: GET /computergroups/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindComputerGroupsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computergroups/name/'.Path::segment((string) $this->name);
    }
}
