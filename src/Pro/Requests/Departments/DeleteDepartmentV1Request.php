<?php

namespace spkm\Jamf\Pro\Requests\Departments;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified department record: DELETE /v1/departments/{id}.
 *
 * Removes specified department record
 */
class DeleteDepartmentV1Request extends DeleteRequest
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
        return '/v1/departments/'.Path::segment((string) $this->id);
    }
}
