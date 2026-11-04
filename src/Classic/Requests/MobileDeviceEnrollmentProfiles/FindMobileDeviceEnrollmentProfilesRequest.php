<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mobile device enrollment profiles: GET /mobiledeviceenrollmentprofiles.
 */
class FindMobileDeviceEnrollmentProfilesRequest extends ClassicGetRequest
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
        return '/mobiledeviceenrollmentprofiles';
    }
}
