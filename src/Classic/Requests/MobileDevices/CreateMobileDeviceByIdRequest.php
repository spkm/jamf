<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device by id: POST /mobiledevices/id/{id}.
 *
 * To distinguish between mobile device types (e.g., iPad, iPhone, or Apple TV), use the field. Default mobile device
 * type is 'Unknown'.
 */
class CreateMobileDeviceByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevices/id/'.Path::segment((string) $this->id);
    }
}
