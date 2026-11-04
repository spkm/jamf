<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ApiRolePrivileges;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiRolePrivileges\GetApiRolePrivilegesSearchV1Request;
use spkm\Jamf\Pro\Requests\ApiRolePrivileges\GetApiRolePrivilegesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The api-role-privileges endpoints of the Jamf Pro API, from Jamf::apiRolePrivileges().
 *
 * @extends BaseResource<Data>
 */
class ApiRolePrivilegesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Search the current Jamf API Role Privileges: GET /v1/api-role-privileges/search.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: name (required), limit.
     */
    public function getApiRolePrivilegesSearchV1(array $options = []): ?ApiRolePrivileges
    {
        return $this->fetch(new GetApiRolePrivilegesSearchV1Request($options));
    }

    /**
     * Get the current Jamf API Role Privileges: GET /v1/api-role-privileges.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getApiRolePrivilegesV1(array $options = []): ?ApiRolePrivileges
    {
        return $this->fetch(new GetApiRolePrivilegesV1Request($options));
    }
}
