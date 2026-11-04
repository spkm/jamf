<?php

namespace spkm\Jamf\Pro\Requests\Groups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a group by platform UUID: PATCH /v1/groups/{id}.
 *
 * Updates a group by its platform UUID. For both smart and static groups, groupName and groupDescription can be
 * updated. For smart groups, criteria can also be updated. For static groups, assignments can also be updated.
 * Requires appropriate UPDATE privileges.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class UpdateGroupV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/groups/'.Path::segment((string) $this->id);
    }
}
