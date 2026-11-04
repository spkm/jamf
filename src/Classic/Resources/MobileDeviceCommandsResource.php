<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandByCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileDeviceNameCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByCommandRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsByUuidRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceCommands\FindMobileDeviceCommandsRequest;

/**
 * The mobiledevicecommands endpoints of the Classic API, from Jamf::classic()->mobileDeviceCommands().
 */
class MobileDeviceCommandsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceCommandsRequest;
    }

    /**
     * Creates a new mobile device command. Command and mobile device list specified in an XML file. Commands
     * supported: Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword,
     * SettingsEnableDataRoaming, SettingsDisableDataRoaming, SettingsEnableVoiceRoaming,: POST
     * /mobiledevicecommands/command.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileDeviceCommand(array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceCommandRequest($record));
    }

    /**
     * Creates a new mobile device command using command name. Command and mobile device list specified in an XML
     * file. Commands supported: Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword,
     * SettingsEnableDataRoaming, SettingsDisableDataRoaming,: POST /mobiledevicecommands/command/{command}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileDeviceCommandByCommand(string $command, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceCommandByCommandRequest($command, $record));
    }

    /**
     * Creates a new mobile device command. Command and mobile device list specified in URL. Commands supported:
     * Settings, ClearPasscode, UnmanageDevice, UpdateInventory, ClearRestrictionsPassword, SettingsEnableDataRoaming,
     * SettingsDisableDataRoaming, SettingsEnableVoiceRoaming,: POST
     * /mobiledevicecommands/command/{command}/id/{id_list}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileDeviceCommandURL(string $command, string $idList, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceCommandURLRequest($command, $idList, $record));
    }

    /**
     * Creates a new command to set the name of a mobile device. Command and mobile device list specified in URL.
     * Command fails when another DeviceName command is pending. Use of a list of devices is generally not advised:
     * POST /mobiledevicecommands/command/DeviceName/{device_name}/id/{id_list}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileDeviceNameCommandURL(string $deviceName, string $idList, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceNameCommandURLRequest($deviceName, $idList, $record));
    }

    /**
     * Creates a new command to request that a mobile device update its OS. Command and mobile device list specified
     * in URL. Device will be updated to the latest OS version based on device eligibility: POST
     * /mobiledevicecommands/command/ScheduleOSUpdate/{install_action}/id/{id_list}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileScheduleOSUpdateCommandURL(string $installAction, string $idList, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileScheduleOSUpdateCommandURLRequest($installAction, $idList, $record));
    }

    /**
     * Creates a new command to request that a mobile device update its OS. Command and mobile device list specified
     * in URL. Mixing iOS and tvOS devices in ID list is not advised, as product version is specific to OS type: POST
     * /mobiledevicecommands/command/ScheduleOSUpdate/{install_action}/{product_version}/id/{id_list}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_command>), or the XML itself.
     */
    public function createMobileScheduleOSUpdateCommandWithProductVersionURL(string $installAction, string $productVersion, string $idList, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest($installAction, $productVersion, $idList, $record));
    }

    /**
     * Finds all mobile device commands: GET /mobiledevicecommands.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceCommands(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceCommandsRequest($options));
    }

    /**
     * Finds all mobile device commands for specified command: GET /mobiledevicecommands/command/{command}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceCommandsByCommand(string $command, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceCommandsByCommandRequest($command, $options));
    }

    /**
     * Finds all mobile device commands by name. Same as command below: GET /mobiledevicecommands/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceCommandsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceCommandsByNameRequest($name, $options));
    }

    /**
     * Finds a mobile device command by uuid: GET /mobiledevicecommands/uuid/{uuid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceCommandsByUuid(string $uuid, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceCommandsByUuidRequest($uuid, $options));
    }
}
