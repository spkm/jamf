<?php

namespace spkm\Jamf\Classic\Requests\VppAssignments;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates a vpp assignment by id: PUT /vppassignments/id/{id}.
 *
 * Name is required.
 */
class UpdateAssignmentByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
