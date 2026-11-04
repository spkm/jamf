<?php

namespace spkm\Jamf\Pro\Requests\MobileDevicePrestages;

use spkm\Jamf\Pro\Data\GetMobileDevicePrestageV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Mobile Device Prestage with the supplied id: GET /v3/mobile-device-prestages/{id}.
 *
 * Retrieves a Mobile Device Prestage with the supplied id
 */
class GetMobileDevicePrestageV3Request extends GetRequest
{
    protected ?string $dto = GetMobileDevicePrestageV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/mobile-device-prestages/'.Path::segment((string) $this->id);
    }
}
