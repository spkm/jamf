<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all mobile device commands for specified command: GET /mobiledevicecommands/command/{command}.
 *
 * You can POST using this resource URL.
 */
class FindMobileDeviceCommandsByCommandRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $command, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command/'.Path::segment((string) $this->command);
    }
}
