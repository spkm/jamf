<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device provisioning profiles by uuid: GET /mobiledeviceprovisioningprofiles/uuid/{uuid}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceProvisioningProfilesByUUIDRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $uuid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceprovisioningprofiles/uuid/'.Path::segment((string) $this->uuid);
    }
}
