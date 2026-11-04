<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\StaticComputerGroupAssignment;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update membership of a static computer group: PUT /v3/computer-groups/static-groups/{id}.
 */
class ReplaceComputerGroupsStaticGroupV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = StaticComputerGroupAssignment::class;

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
        return '/v3/computer-groups/static-groups/'.Path::segment((string) $this->id);
    }
}
