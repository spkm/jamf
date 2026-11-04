<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\PrestageSyncStatusV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all Prestage sync States for all prestages: GET /v2/mobile-device-prestages/syncs.
 *
 * Get all prestage sync states for all prestages
 */
class GetMobileDevicePrestagesSyncsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PrestageSyncStatusV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages/syncs';
    }
}
