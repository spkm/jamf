<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all mobile device commands by name. Same as command below: GET /mobiledevicecommands/name/{name}.
 *
 * You can POST using this resource URL.
 */
class FindMobileDeviceCommandsByNameRequest extends ClassicGetRequest
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
        return '/mobiledevicecommands/name/'.Path::segment((string) $this->name);
    }
}
