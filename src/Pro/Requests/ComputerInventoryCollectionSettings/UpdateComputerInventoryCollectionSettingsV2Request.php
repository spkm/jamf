<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update computer inventory settings: PATCH /v2/computer-inventory-collection-settings.
 */
class UpdateComputerInventoryCollectionSettingsV2Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::NONE;

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
        return '/v2/computer-inventory-collection-settings';
    }
}
