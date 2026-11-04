<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mobile device provisioning profiles: GET /mobiledeviceprovisioningprofiles.
 */
class FindMobileDeviceProvisioningProfilesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceprovisioningprofiles';
    }
}
