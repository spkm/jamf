<?php

namespace spkm\Jamf\Classic\Requests\Departments;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a department by id: DELETE /departments/id/{id}.
 */
class DeleteDepartmentByIdRequest extends ClassicDeleteRequest
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
        return '/departments/id/'.Path::segment((string) $this->id);
    }
}
