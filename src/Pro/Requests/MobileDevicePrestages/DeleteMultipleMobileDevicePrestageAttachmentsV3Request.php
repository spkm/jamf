<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove an attachment for a Mobile Device Prestage: POST /v3/mobile-device-prestages/{id}/attachments/delete-multiple.
 */
class DeleteMultipleMobileDevicePrestageAttachmentsV3Request extends WriteRequest
{
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
        return '/v3/mobile-device-prestages/'.Path::segment((string) $this->id).'/attachments/delete-multiple';
    }
}
