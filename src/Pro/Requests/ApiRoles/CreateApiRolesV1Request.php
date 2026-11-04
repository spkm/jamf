<?php

namespace spkm\Jamf\Pro\Requests\ApiRoles;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ApiRole;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create a new API role: POST /v1/api-roles.
 *
 * Post to create new Role
 */
class CreateApiRolesV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ApiRole::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/api-roles';
    }
}
