<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all mobile device commands: GET /mobiledevicecommands.
 */
class FindMobileDeviceCommandsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands';
    }
}
