<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceGroups;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device group by id: DELETE /mobiledevicegroups/id/{id}.
 */
class DeleteMobileDeviceGroupByIdRequest extends ClassicDeleteRequest
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
