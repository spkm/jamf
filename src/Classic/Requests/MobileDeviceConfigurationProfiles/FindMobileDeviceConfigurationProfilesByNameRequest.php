<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device configuration profiles by name: GET /mobiledeviceconfigurationprofiles/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceConfigurationProfilesByNameRequest extends ClassicGetRequest
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
        return '/mobiledeviceconfigurationprofiles/name/'.Path::segment((string) $this->name);
    }
}
