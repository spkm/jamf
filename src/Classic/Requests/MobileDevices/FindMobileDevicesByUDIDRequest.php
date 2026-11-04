<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile devices by UDID: GET /mobiledevices/udid/{udid}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDevicesByUDIDRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $udid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevices/udid/'.Path::segment((string) $this->udid);
    }
}
