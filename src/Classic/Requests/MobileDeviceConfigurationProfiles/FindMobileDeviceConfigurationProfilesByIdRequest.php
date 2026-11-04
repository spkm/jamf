<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device configuration profiles by id: GET /mobiledeviceconfigurationprofiles/id/{id}.
 */
class FindMobileDeviceConfigurationProfilesByIdRequest extends ClassicGetRequest
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
