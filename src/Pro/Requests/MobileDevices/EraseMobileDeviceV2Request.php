<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use JsonSerializable;
use spkm\Jamf\Pro\Data\EraseDeviceMobileDeviceResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Erase a Mobile Device: POST /v2/mobile-devices/{id}/erase.
 */
class EraseMobileDeviceV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = EraseDeviceMobileDeviceResponse::class;

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
        return '/v2/mobile-devices/'.Path::segment((string) $this->id).'/erase';
    }
}
