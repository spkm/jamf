<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device command using command name. Command and mobile device list specified in an XML file. Commands supported: Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword, SettingsEnableDataRoaming, SettingsDisableDataRoaming,: POST /mobiledevicecommands/command/{command}.
 */
class CreateMobileDeviceCommandByCommandRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_command>), or the XML itself.
     */
    public function __construct(protected string $command, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command/'.Path::segment((string) $this->command);
    }
}
