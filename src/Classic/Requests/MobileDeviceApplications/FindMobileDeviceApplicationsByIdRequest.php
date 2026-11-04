<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device applications by id: GET /mobiledeviceapplications/id/{id}.
 */
class FindMobileDeviceApplicationsByIdRequest extends ClassicGetRequest
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
        return '/mobiledeviceapplications/id/'.Path::segment((string) $this->id);
    }
}
