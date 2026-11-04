<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use spkm\Jamf\Pro\Data\UnmanageMobileDeviceResponse;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Unmanage a Mobile Device: POST /v2/mobile-devices/{id}/unmanage.
 */
class UnmanageMobileDeviceV2Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = UnmanageMobileDeviceResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-devices/'.Path::segment((string) $this->id).'/unmanage';
    }
}
