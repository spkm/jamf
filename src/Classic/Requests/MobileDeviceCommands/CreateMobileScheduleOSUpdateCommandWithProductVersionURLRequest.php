<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new command to request that a mobile device update its OS. Command and mobile device list specified in URL. Mixing iOS and tvOS devices in ID list is not advised, as product version is specific to OS type: POST /mobiledevicecommands/command/ScheduleOSUpdate/{install_action}/{product_version}/id/{id_list}.
 *
 * Example: JSSResource/mobiledevicecommands/command/ScheduleOSUpdate/1/12.3.1/id/13 -X POST
 */
class CreateMobileScheduleOSUpdateCommandWithProductVersionURLRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_command>), or the XML itself.
     */
    public function __construct(protected string $installAction, protected string $productVersion, protected string $idList, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledevicecommands/command/ScheduleOSUpdate/'.Path::segment((string) $this->installAction).'/'.Path::segment((string) $this->productVersion).'/id/'.Path::segment((string) $this->idList);
    }
}
