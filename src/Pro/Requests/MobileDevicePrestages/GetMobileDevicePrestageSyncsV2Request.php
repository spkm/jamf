<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\PrestageSyncStatusV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get all prestage sync states for a single prestage: GET /v2/mobile-device-prestages/{id}/syncs.
 */
class GetMobileDevicePrestageSyncsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = PrestageSyncStatusV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id).'/syncs';
    }
}
