<?php

namespace spkm\Jamf\Pro\Requests\ApiRoles;

use spkm\Jamf\Pro\Data\ApiRole;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get the current Jamf API Roles: GET /v1/api-roles.
 *
 * Get roles with Search Criteria
 */
class GetApiRolesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ApiRole::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-roles';
    }
}
