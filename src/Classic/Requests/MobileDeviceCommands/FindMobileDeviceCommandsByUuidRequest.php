<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds a mobile device command by uuid: GET /mobiledevicecommands/uuid/{uuid}.
 */
class FindMobileDeviceCommandsByUuidRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $uuid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/uuid/'.Path::segment((string) $this->uuid);
    }
}
