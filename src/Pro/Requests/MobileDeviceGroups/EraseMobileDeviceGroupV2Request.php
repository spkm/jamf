<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Erase all devices in the group: POST /v2/mobile-device-groups/{id}/erase.
 */
class EraseMobileDeviceGroupV2Request extends WriteRequest
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
        return '/v2/mobile-device-groups/'.Path::segment((string) $this->id).'/erase';
    }
}
