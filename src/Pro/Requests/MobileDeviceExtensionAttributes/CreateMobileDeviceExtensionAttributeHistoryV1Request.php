<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add specified Mobile Device Extension Attribute history object notes: POST /v1/mobile-device-extension-attributes/{id}/history.
 */
class CreateMobileDeviceExtensionAttributeHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ObjectHistory::class;

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
        return '/v1/mobile-device-extension-attributes/'.Path::segment((string) $this->id).'/history';
    }
}
