<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device command. Command and mobile device list specified in URL. Commands supported: Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword, SettingsEnableDataRoaming, SettingsDisableDataRoaming, SettingsEnableVoiceRoaming,: POST /mobiledevicecommands/command/{command}/id/{id_list}.
 *
 * Example: JSSResource/mobiledevicecommands/command/UpdateInventory/id/13 -X POST
 */
class CreateMobileDeviceCommandURLRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_command>), or the XML itself.
     */
    public function __construct(protected string $command, protected string $idList, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command/'.Path::segment((string) $this->command).'/id/'.Path::segment((string) $this->idList);
    }
}
