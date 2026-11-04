<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device provisioning profile by id: DELETE /mobiledeviceprovisioningprofiles/id/{id}.
 */
class DeleteMobileDeviceProvisioningProfileByIdRequest extends ClassicDeleteRequest
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
        return '/mobiledeviceprovisioningprofiles/id/'.Path::segment((string) $this->id);
    }
}
