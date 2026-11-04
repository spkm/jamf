<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Erase all devices in the group: POST /v1/mobile-device-groups/{id}/erase.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class EraseMobileDeviceGroupV1Request extends WriteRequest
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
        return '/v1/mobile-device-groups/'.Path::segment((string) $this->id).'/erase';
    }
}
