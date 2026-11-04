<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ComputerInventoryCollectionSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update computer inventory settings: PATCH /v1/computer-inventory-collection-settings.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class UpdateComputerInventoryCollectionSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ComputerInventoryCollectionSettings::class;

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
        return '/v1/computer-inventory-collection-settings';
    }
}
