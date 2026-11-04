<?php

namespace spkm\Jamf\Classic\Requests\VppAssignments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds VPP Assignment by id: GET /vppassignments/id/{id}.
 */
class FindAssignmentByIdRequest extends ClassicGetRequest
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
        return '/vppassignments/id/'.Path::segment((string) $this->id);
    }
}
