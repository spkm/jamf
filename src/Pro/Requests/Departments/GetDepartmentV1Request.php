<?php

namespace spkm\Jamf\Pro\Requests\Departments;

use spkm\Jamf\Pro\Data\Department;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Department object: GET /v1/departments/{id}.
 *
 * Gets specified Department object
 */
class GetDepartmentV1Request extends GetRequest
{
    protected ?string $dto = Department::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/departments/'.Path::segment((string) $this->id);
    }
}
