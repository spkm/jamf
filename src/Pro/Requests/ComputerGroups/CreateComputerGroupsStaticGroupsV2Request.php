<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create membership of a static computer group: POST /v2/computer-groups/static-groups.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class CreateComputerGroupsStaticGroupsV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computer-groups/static-groups';
    }
}
