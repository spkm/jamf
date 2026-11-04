<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device history by name: GET /mobiledevicehistory/name/{name}.
 */
class FindMobileDeviceHistoryByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicehistory/name/'.Path::segment((string) $this->name);
    }
}
