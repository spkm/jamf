<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new command to set the name of a mobile device. Command and mobile device list specified in URL. Command fails when another DeviceName command is pending. Use of a list of devices is generally not advised: POST /mobiledevicecommands/command/DeviceName/{device_name}/id/{id_list}.
 *
 * Example: JSSResource/mobiledevicecommands/command/DeviceName/NewName/id/13 -X POST
 */
class CreateMobileDeviceNameCommandURLRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_command>), or the XML itself.
     */
    public function __construct(protected string $deviceName, protected string $idList, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command/DeviceName/'.Path::segment((string) $this->deviceName).'/id/'.Path::segment((string) $this->idList);
    }
}
