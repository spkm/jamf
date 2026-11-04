<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device enrollment profiles by id: GET /mobiledeviceenrollmentprofiles/id/{id}.
 */
class FindMobileDeviceEnrollmentProfilesByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceenrollmentprofiles/id/'.Path::segment((string) $this->id);
    }
}
