<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile devices by serial number: GET /mobiledevices/serialnumber/{serialnumber}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDevicesBySerialNumberRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $serialnumber, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevices/serialnumber/'.Path::segment((string) $this->serialnumber);
    }
}
