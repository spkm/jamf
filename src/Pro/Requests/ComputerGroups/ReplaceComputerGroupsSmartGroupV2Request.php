<?php

namespace spkm\Jamf\Pro\Requests\ComputerGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\SmartComputerGroupV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Smart Computer Group: PUT /v2/computer-groups/smart-groups/{id}.
 *
 * Updates a Smart Computer Group
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class ReplaceComputerGroupsSmartGroupV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = SmartComputerGroupV2::class;

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
        return '/v2/computer-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
