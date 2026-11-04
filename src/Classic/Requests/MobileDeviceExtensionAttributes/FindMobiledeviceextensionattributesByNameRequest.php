<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceExtensionAttributes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobiledeviceextensionattributes by name: GET /mobiledeviceextensionattributes/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobiledeviceextensionattributesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceextensionattributes/name/'.Path::segment((string) $this->name);
    }
}
