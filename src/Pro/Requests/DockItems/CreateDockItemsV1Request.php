<?php

namespace spkm\Jamf\Pro\Requests\DockItems;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create a DockItem: POST /v1/dock-items.
 *
 * Creates a DockItem
 */
class CreateDockItemsV1Request extends WriteRequest
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
        return '/v1/dock-items';
    }
}
