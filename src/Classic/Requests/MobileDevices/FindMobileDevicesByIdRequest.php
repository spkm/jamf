<?php

namespace spkm\Jamf\Classic\Requests\MobileDevices;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile devices by id: GET /mobiledevices/id/{id}.
 *
 * Returns mobile device information by id.
 */
class FindMobileDevicesByIdRequest extends ClassicGetRequest
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
        return '/mobiledevices/id/'.Path::segment((string) $this->id);
    }
}
