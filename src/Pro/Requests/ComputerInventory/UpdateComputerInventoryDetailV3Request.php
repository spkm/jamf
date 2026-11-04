<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update specific fields on a computer: PATCH /v3/computers-inventory-detail/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class UpdateComputerInventoryDetailV3Request extends WriteRequest
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
        return '/v3/computers-inventory-detail/'.Path::segment((string) $this->id);
    }
}
