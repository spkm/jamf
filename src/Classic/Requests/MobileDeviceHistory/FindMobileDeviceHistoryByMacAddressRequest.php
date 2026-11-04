<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device history by wifi mac address: GET /mobiledevicehistory/macaddress/{macaddress}.
 */
class FindMobileDeviceHistoryByMacAddressRequest extends ClassicGetRequest
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
        return '/mobiledevicehistory/macaddress/'.Path::segment((string) $this->macaddress);
    }
}
