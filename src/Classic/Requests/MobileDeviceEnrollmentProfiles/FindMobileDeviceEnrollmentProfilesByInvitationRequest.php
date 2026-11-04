<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device enrollment profiles by invitation: GET /mobiledeviceenrollmentprofiles/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceEnrollmentProfilesByInvitationRequest extends ClassicGetRequest
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
        return '/mobiledeviceenrollmentprofiles/name/'.Path::segment((string) $this->name);
    }
}
