<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use spkm\Jamf\Pro\Data\MobileDeviceDetailsGetV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Mobile Device: GET /v2/mobile-devices/{id}/detail.
 *
 * Get MobileDevice
 */
class GetMobileDeviceDetailV2Request extends GetRequest
{
    protected ?string $dto = MobileDeviceDetailsGetV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-devices/'.Path::segment((string) $this->id).'/detail';
    }
}
