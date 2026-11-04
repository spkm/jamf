<?php

namespace spkm\Jamf\Classic\Requests\ComputerCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer command. Commands supported: UnmanageDevice, BlankPush, UnlockUserAccount, DeleteUser, EnableRemoteDesktop (macOS 10.14.4 and later), DisableRemoteDesktop (macOS 10.14.4 and later), ScheduleOSUpdate: POST /computercommands/command/{command}.
 *
 * Command and computer list specified in an XML file.UnlockUserAccount and DeleteUser require a user_name that
 * reflects a local account that is to be unlocked or removed. Command uuid and date_sent are set by Jamf Pro.
 */
class CreateComputerCommandByCommandRequest extends ClassicWriteRequest
{
    protected string $root = 'computer_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_command>), or the XML itself.
     */
    public function __construct(protected string $command, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computercommands/command/'.Path::segment((string) $this->command);
    }
}
