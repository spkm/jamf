<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile devices by wifi mac address: GET /mobiledevices/macaddress/{macaddress}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDevicesByMacAddressRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $macaddress, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevices/macaddress/'.Path::segment((string) $this->macaddress);
    }
}
