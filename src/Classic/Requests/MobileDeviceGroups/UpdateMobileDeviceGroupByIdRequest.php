<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceGroups;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mobile device group by id: PUT /mobiledevicegroups/id/{id}.
 *
 * PUT also works with a name. One or more mobile devices can be added by using instead of . One or more computers can
 * be deleted by using instead of
 */
class UpdateMobileDeviceGroupByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
