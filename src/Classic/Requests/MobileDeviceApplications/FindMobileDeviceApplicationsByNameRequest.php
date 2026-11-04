<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device applications by name: GET /mobiledeviceapplications/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceApplicationsByNameRequest extends ClassicGetRequest
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
        return '/mobiledeviceapplications/name/'.Path::segment((string) $this->name);
    }
}
