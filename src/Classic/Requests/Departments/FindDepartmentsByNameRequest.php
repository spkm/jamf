<?php

namespace spkm\Jamf\Classic\Requests\Departments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds departments by name: GET /departments/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindDepartmentsByNameRequest extends ClassicGetRequest
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
        return '/departments/name/'.Path::segment((string) $this->name);
    }
}
