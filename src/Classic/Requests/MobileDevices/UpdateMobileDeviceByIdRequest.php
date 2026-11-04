<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing mobile device by id: PUT /mobiledevices/id/{id}.
 *
 * Updates an existing mobile device.
 */
class UpdateMobileDeviceByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
