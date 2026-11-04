<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device provisioning profiles by name: GET /mobiledeviceprovisioningprofiles/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceProvisioningProfilesByNameRequest extends ClassicGetRequest
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
        return '/mobiledeviceprovisioningprofiles/name/'.Path::segment((string) $this->name);
    }
}
