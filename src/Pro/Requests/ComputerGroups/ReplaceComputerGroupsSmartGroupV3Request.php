<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SmartComputerGroupV3;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Smart Computer Group: PUT /v3/computer-groups/smart-groups/{id}.
 *
 * Updates a Smart Computer Group with strict andOr enum validation.
 */
class ReplaceComputerGroupsSmartGroupV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SmartComputerGroupV3::class;

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
        return '/v3/computer-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
