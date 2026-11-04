<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventoryCollectionSettings;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create Computer Inventory Collection Settings Custom Path: POST /v1/computer-inventory-collection-settings/custom-path.
 *
 * Creates a custom search path to use when collecting applications, fonts, and plug-ins.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class CreateComputerInventoryCollectionSettingsCustomPathV1Request extends WriteRequest
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
        return '/v1/computer-inventory-collection-settings/custom-path';
    }
}
