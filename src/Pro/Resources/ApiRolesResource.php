<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ApiRole;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiRoles\CreateApiRolesV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\DeleteApiRoleV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\GetApiRolesV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\GetApiRoleV1Request;
use spkm\Jamf\Pro\Requests\ApiRoles\ReplaceApiRoleV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The api-roles endpoints of the Jamf Pro API, from Jamf::apiRoles().
 *
 * @extends Builder<ApiRole>
 */
class ApiRolesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ApiRole::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiRolesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetApiRoleV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateApiRolesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceApiRoleV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteApiRoleV1Request($id);
    }

    /**
     * Create a new API role: POST /v1/api-roles.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createApiRolesV1(array|JsonSerializable $body, array $options = []): ?ApiRole
    {
        return $this->fetch(new CreateApiRolesV1Request($body, $options));
    }

    /**
     * Delete API Integrations Role: DELETE /v1/api-roles/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteApiRoleV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteApiRoleV1Request($id, $options));
    }

    /**
     * Get the specific Jamf API Role: GET /v1/api-roles/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getApiRoleV1(int|string $id, array $options = []): ?ApiRole
    {
        return $this->fetch(new GetApiRoleV1Request($id, $options));
    }

    /**
     * Get the current Jamf API Roles: GET /v1/api-roles.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ApiRole>
     */
    public function getApiRolesV1(): PagedResource
    {
        return new PagedResource($this->pro(), ApiRole::class, fn (Query $query) => new GetApiRolesV1Request($query));
    }

    /**
     * Update API Integrations Role: PUT /v1/api-roles/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceApiRoleV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ApiRole
    {
        return $this->fetch(new ReplaceApiRoleV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
