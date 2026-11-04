<?php

namespace spkm\Jamf\Classic\Requests\Departments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds departments by id: GET /departments/id/{id}.
 */
class FindDepartmentsByIdRequest extends ClassicGetRequest
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
