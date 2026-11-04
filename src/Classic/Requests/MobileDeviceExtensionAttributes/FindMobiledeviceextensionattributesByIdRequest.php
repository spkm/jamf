<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device extension attributes by id: GET /mobiledeviceextensionattributes/id/{id}.
 */
class FindMobiledeviceextensionattributesByIdRequest extends ClassicGetRequest
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
