<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use JsonSerializable;
use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove Device Scope for a specific Mobile Device Prestage: POST /v2/mobile-device-prestages/{id}/scope/delete-multiple.
 *
 * Remove device scope for a specific mobile device prestage
 */
class DeleteMultipleMobileDevicePrestageScopeV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = PrestageScopeResponseV2::class;

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
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id).'/scope/delete-multiple';
    }
}
