<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Device Scope for a specific Mobile Device Prestage: GET /v2/mobile-device-prestages/{id}/scope.
 *
 * Get device scope for a specific mobile device prestage
 */
class GetMobileDevicePrestageScopeV2Request extends GetRequest
{
    protected ?string $dto = PrestageScopeResponseV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id).'/scope';
    }
}
