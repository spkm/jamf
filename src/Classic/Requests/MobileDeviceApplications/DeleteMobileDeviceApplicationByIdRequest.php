<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device application by id: DELETE /mobiledeviceapplications/id/{id}.
 */
class DeleteMobileDeviceApplicationByIdRequest extends ClassicDeleteRequest
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
