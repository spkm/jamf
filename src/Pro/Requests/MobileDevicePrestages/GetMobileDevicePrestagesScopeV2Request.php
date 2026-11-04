<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\PrestageScopeV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all Device Scope for all Mobile Device Prestages: GET /v2/mobile-device-prestages/scope.
 *
 * Get all device scope for all mobile device prestages
 */
class GetMobileDevicePrestagesScopeV2Request extends GetRequest
{
    protected ?string $dto = PrestageScopeV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages/scope';
    }
}
