<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device enrollment profile by id: POST /mobiledeviceenrollmentprofiles/id/{id}.
 */
class CreateMobileDeviceEnrollmentProfilesByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_enrollment_profile';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_enrollment_profile>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceenrollmentprofiles/id/'.Path::segment((string) $this->id);
    }
}
