<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mobile device provisioning profile by id: PUT /mobiledeviceprovisioningprofiles/id/{id}.
 */
class UpdateMobileDeviceProvisioningProfileByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'mobile_device_provisioning_profile';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_provisioning_profile>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceprovisioningprofiles/id/'.Path::segment((string) $this->id);
    }
}
