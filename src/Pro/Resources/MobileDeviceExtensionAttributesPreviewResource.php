<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\MobileDeviceExtensionAttributeResults;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDeviceExtensionAttributesPreview\GetDevicesExtensionAttributesRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The mobile-device-extension-attributes-preview endpoints of the Jamf Pro API, from Jamf::mobileDeviceExtensionAttributesPreview().
 *
 * @extends BaseResource<Data>
 */
class MobileDeviceExtensionAttributesPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Mobile Device Extension Attribute values placed in select paramter: GET /devices/extensionAttributes.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: select.
     */
    public function getDevicesExtensionAttributes(array $options = []): ?MobileDeviceExtensionAttributeResults
    {
        return $this->fetch(new GetDevicesExtensionAttributesRequest($options));
    }
}
