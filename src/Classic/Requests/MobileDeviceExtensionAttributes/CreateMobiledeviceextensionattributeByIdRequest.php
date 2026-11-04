<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device extension attribute by id: POST /mobiledeviceextensionattributes/id/{id}.
 */
class CreateMobiledeviceextensionattributeByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_extension_attribute';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_extension_attribute>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
