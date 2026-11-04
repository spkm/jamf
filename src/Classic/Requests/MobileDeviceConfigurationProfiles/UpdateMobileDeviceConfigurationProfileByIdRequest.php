<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mobile device configuration profile by id: PUT /mobiledeviceconfigurationprofiles/id/{id}.
 */
class UpdateMobileDeviceConfigurationProfileByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
