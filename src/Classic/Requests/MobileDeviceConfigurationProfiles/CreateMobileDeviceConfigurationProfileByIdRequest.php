<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device configuration profile by id: POST /mobiledeviceconfigurationprofiles/id/{id}.
 */
class CreateMobileDeviceConfigurationProfileByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'configuration_profile';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <configuration_profile>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceconfigurationprofiles/id/'.Path::segment((string) $this->id);
    }
}
