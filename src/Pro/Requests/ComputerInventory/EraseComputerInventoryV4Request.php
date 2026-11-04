<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use JsonSerializable;
use spkm\Jamf\Pro\Data\EraseDeviceComputerResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Erase a computer: POST /v4/computers-inventory/{id}/erase.
 */
class EraseComputerInventoryV4Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = EraseDeviceComputerResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v4/computers-inventory/'.Path::segment((string) $this->id).'/erase';
    }
}
