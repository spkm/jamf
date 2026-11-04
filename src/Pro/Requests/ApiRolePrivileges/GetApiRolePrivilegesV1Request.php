<?php

namespace spkm\Jamf\Pro\Requests\ApiRolePrivileges;

use spkm\Jamf\Pro\Data\ApiRolePrivileges;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the current Jamf API Role Privileges: GET /v1/api-role-privileges.
 *
 * Get role privileges
 */
class GetApiRolePrivilegesV1Request extends GetRequest
{
    protected ?string $dto = ApiRolePrivileges::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-role-privileges';
    }
}
