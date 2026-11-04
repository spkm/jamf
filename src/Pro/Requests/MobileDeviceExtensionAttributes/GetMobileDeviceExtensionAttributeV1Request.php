<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributes;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Mobile Device Extension Attribute object: GET /v1/mobile-device-extension-attributes/{id}.
 *
 * Gets specified Mobile Device Extension Attribute object.
 */
class GetMobileDeviceExtensionAttributeV1Request extends GetRequest
{
    protected ?string $dto = MobileDeviceExtensionAttributes::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-extension-attributes/'.Path::segment((string) $this->id);
    }
}
