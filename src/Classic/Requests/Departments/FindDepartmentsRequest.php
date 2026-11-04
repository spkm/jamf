<?php

namespace spkm\Jamf\Classic\Requests\Departments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all departments: GET /departments.
 */
class FindDepartmentsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/departments';
    }
}
