<?php

namespace spkm\Jamf\Pro\Requests\ApiRoles;

use spkm\Jamf\Pro\Data\ApiRole;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the specific Jamf API Role: GET /v1/api-roles/{id}.
 *
 * Get specific Role
 */
class GetApiRoleV1Request extends GetRequest
{
    protected ?string $dto = ApiRole::class;

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
