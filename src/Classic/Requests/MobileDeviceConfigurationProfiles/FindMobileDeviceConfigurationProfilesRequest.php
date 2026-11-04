<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mobile device configuration profiles: GET /mobiledeviceconfigurationprofiles.
 */
class FindMobileDeviceConfigurationProfilesRequest extends ClassicGetRequest
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
        return '/mobiledeviceconfigurationprofiles';
    }
}
