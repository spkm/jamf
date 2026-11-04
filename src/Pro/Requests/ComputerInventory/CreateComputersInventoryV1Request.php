<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create Computer Inventory record: POST /v1/computers-inventory.
 *
 * Creates Computer Inventory record
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class CreateComputersInventoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

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
        return '/v1/computers-inventory';
    }
}
