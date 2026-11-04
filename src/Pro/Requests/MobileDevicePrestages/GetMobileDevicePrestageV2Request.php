<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Mobile Device Prestage with the supplied id: GET /v2/mobile-device-prestages/{id}.
 *
 * Retrieves a Mobile Device Prestage with the supplied id
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetMobileDevicePrestageV2Request extends GetRequest
{
    protected ?string $dto = GetMobileDevicePrestageV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-prestages/'.Path::segment((string) $this->id);
    }
}
