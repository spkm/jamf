<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Creates a new mobile device command. Command and mobile device list specified in an XML file. Commands supported: Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword, SettingsEnableDataRoaming, SettingsDisableDataRoaming, SettingsEnableVoiceRoaming,: POST /mobiledevicecommands/command.
 */
class CreateMobileDeviceCommandRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_command>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command';
    }
}
