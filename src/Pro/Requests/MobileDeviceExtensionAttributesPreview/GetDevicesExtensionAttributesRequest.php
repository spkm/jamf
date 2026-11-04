<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributesPreview;

use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributeResults;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Mobile Device Extension Attribute values placed in select paramter: GET /devices/extensionAttributes.
 *
 * Gets Mobile Device Extension Attribute values placed in select parameter.
 */
class GetDevicesExtensionAttributesRequest extends GetRequest
{
    protected ?string $dto = MobileDeviceExtensionAttributeResults::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: select.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/devices/extensionAttributes';
    }
}
