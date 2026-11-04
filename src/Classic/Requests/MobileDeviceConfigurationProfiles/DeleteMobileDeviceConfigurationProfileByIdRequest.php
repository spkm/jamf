<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device configuration profile by id: DELETE /mobiledeviceconfigurationprofiles/id/{id}.
 */
class DeleteMobileDeviceConfigurationProfileByIdRequest extends ClassicDeleteRequest
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
        return '/mobiledeviceconfigurationprofiles/id/'.Path::segment((string) $this->id);
    }
}
