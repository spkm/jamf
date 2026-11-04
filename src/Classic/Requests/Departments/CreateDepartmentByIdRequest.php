<?php

namespace spkm\Jamf\Classic\Requests\Departments;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new department by id: POST /departments/id/{id}.
 */
class CreateDepartmentByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'department';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <department>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/departments/id/'.Path::segment((string) $this->id);
    }
}
