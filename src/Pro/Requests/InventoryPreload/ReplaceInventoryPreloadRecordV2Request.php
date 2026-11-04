<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\InventoryPreloadRecordV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update an Inventory Preload record: PUT /v2/inventory-preload/records/{id}.
 *
 * Updates an Inventory Preload record.
 */
class ReplaceInventoryPreloadRecordV2Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = InventoryPreloadRecordV2::class;

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
        return '/v2/inventory-preload/records/'.Path::segment((string) $this->id);
    }
}
