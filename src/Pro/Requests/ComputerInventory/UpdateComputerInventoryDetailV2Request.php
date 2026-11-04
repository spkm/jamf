<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update specific fields on a computer: PATCH /v2/computers-inventory-detail/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class UpdateComputerInventoryDetailV2Request extends WriteRequest
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
        return '/v2/computers-inventory-detail/'.Path::segment((string) $this->id);
    }
}
