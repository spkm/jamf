<?php

namespace spkm\Jamf\Classic\Requests\VppAssignments;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new vpp assignment by id: POST /vppassignments/id/{id}.
 *
 * Name is required.
 */
class CreateAssignmentByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'vpp_assignment';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <vpp_assignment>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/vppassignments/id/'.Path::segment((string) $this->id);
    }
}
