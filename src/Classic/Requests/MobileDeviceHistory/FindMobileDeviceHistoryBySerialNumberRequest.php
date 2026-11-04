<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device history by serial number: GET /mobiledevicehistory/serialnumber/{serialnumber}.
 */
class FindMobileDeviceHistoryBySerialNumberRequest extends ClassicGetRequest
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
        return '/mobiledevicehistory/serialnumber/'.Path::segment((string) $this->serialnumber);
    }
}
