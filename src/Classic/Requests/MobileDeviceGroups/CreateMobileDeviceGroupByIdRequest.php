<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceGroups;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device group by id: POST /mobiledevicegroups/id/{id}.
 *
 * POST also works with a name, but generally id is used.
 */
class CreateMobileDeviceGroupByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_group';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_group>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicegroups/id/'.Path::segment((string) $this->id);
    }
}
