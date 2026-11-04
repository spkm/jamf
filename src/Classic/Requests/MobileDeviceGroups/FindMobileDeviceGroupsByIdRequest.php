<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device groups by id: GET /mobiledevicegroups/id/{id}.
 */
class FindMobileDeviceGroupsByIdRequest extends ClassicGetRequest
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
        return '/mobiledevicegroups/id/'.Path::segment((string) $this->id);
    }
}
