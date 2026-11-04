<?php

namespace spkm\Jamf\Classic\Requests\ComputerCommands;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer command. Commands supported: UnmanageDevice, BlankPush, EnableRemoteDesktop (macOS 10.14.4 and later), DisableRemoteDesktop (macOS 10.14.4 and later), ScheduleOSUpdate: POST /computercommands/command/{command}/id/{id}.
 *
 * Command uuid and date_sent are set by Jamf Pro. Id is used to specify a single computer, or multiple computers
 * separated by commas, such as id/33 or id/33,34
 */
class CreateComputerCommandByCommandShortcut1Request extends ClassicWriteRequest
{
    protected string $root = 'computer_command';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_command>), or the XML itself.
     */
    public function __construct(protected string $command, protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computercommands/command/'.Path::segment((string) $this->command).'/id/'.Path::segment((string) $this->id);
    }
}
