<?php

namespace spkm\Jamf\Pro\Requests\ApiRolePrivileges;

use spkm\Jamf\Pro\Data\ApiRolePrivileges;
use spkm\Jamf\Requests\GetRequest;

/**
 * Search the current Jamf API Role Privileges: GET /v1/api-role-privileges/search.
 *
 * Search role privileges
 */
class GetApiRolePrivilegesSearchV1Request extends GetRequest
{
    protected ?string $dto = ApiRolePrivileges::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: name (required), limit.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-role-privileges/search';
    }
}
