<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer groups by id: GET /computergroups/id/{id}.
 */
class FindComputerGroupsByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computergroups/id/'.Path::segment((string) $this->id);
    }
}
