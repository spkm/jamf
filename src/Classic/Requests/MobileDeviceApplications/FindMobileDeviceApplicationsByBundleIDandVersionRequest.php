<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device applications by bundle ID and version: GET /mobiledeviceapplications/bundleid/{bundleid}/version/{version}.
 *
 * You can also PUT and DELETE using this resource URL.
 */
class FindMobileDeviceApplicationsByBundleIDandVersionRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $bundleid, protected string $version, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceapplications/bundleid/'.Path::segment((string) $this->bundleid).'/version/'.Path::segment((string) $this->version);
    }
}
