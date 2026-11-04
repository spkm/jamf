<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device extension attribute by id: DELETE /mobiledeviceextensionattributes/id/{id}.
 */
class DeleteMobiledeviceextensionattributeByIdRequest extends ClassicDeleteRequest
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
        return '/mobiledeviceextensionattributes/id/'.Path::segment((string) $this->id);
    }
}
