<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create a Smart Computer Group: POST /v3/computer-groups/smart-groups.
 *
 * Creates a Smart Computer Group with strict andOr enum validation.
 */
class CreateComputerGroupsSmartGroupsV3Request extends WriteRequest
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
        return '/v3/computer-groups/smart-groups';
    }
}
