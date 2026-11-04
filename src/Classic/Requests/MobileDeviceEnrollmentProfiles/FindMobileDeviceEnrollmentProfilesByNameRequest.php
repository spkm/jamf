<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device enrollment profiles by invitation: GET /mobiledeviceenrollmentprofiles/invitation/{invitation}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceEnrollmentProfilesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $invitation, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceenrollmentprofiles/invitation/'.Path::segment((string) $this->invitation);
    }
}
