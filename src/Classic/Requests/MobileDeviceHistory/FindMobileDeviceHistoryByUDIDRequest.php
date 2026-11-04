<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device history by UDID: GET /mobiledevicehistory/udid/{udid}.
 */
class FindMobileDeviceHistoryByUDIDRequest extends ClassicGetRequest
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
        return '/mobiledevicehistory/udid/'.Path::segment((string) $this->udid);
    }
}
