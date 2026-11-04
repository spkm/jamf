<?php

namespace spkm\Jamf\Pro\Requests\ApiRoles;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete API Integrations Role: DELETE /v1/api-roles/{id}.
 *
 * Delete specific Role
 */
class DeleteApiRoleV1Request extends DeleteRequest
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
        return '/v1/api-roles/'.Path::segment((string) $this->id);
    }
}
