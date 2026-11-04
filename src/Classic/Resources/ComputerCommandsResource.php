<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandAndActionRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\CreateComputerCommandByCommandShortcut1Request;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsByUuidRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandsRequest;
use spkm\Jamf\Classic\Requests\ComputerCommands\FindComputerCommandStatusByUuidRequest;

/**
 * The computercommands endpoints of the Classic API, from Jamf::classic()->computerCommands().
 */
class ComputerCommandsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerCommandsRequest;
    }

    /**
     * Creates a new computer command. Commands supported: UnmanageDevice, BlankPush, UnlockUserAccount, DeleteUser,
     * EnableRemoteDesktop (macOS 10.14.4 and later), DisableRemoteDesktop (macOS 10.14.4 and later),
     * ScheduleOSUpdate: POST /computercommands/command/{command}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_command>), or the XML itself.
     */
    public function createComputerCommandByCommand(string $command, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerCommandByCommandRequest($command, $record));
    }

    /**
     * Creates a new computer command with a command specific action. Commands supported: ScheduleOSUpdate: POST
     * /computercommands/command/{command}/action/{action}/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_command>), or the XML itself.
     */
    public function createComputerCommandByCommandAndAction(string $command, string $action, int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerCommandByCommandAndActionRequest($command, $action, $id, $record));
    }

    /**
     * Creates a new computer command. Commands supported: UnmanageDevice, BlankPush, EnableRemoteDesktop (macOS
     * 10.14.4 and later), DisableRemoteDesktop (macOS 10.14.4 and later), ScheduleOSUpdate: POST
     * /computercommands/command/{command}/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_command>), or the XML itself.
     */
    public function createComputerCommandByCommandShortcut1(string $command, int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerCommandByCommandShortcut1Request($command, $id, $record));
    }

    /**
     * Finds a computer command status by uuid: GET /computercommands/status/{statusuuid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerCommandStatusByUuid(string $statusuuid, array $options = []): mixed
    {
        return $this->fetch(new FindComputerCommandStatusByUuidRequest($statusuuid, $options));
    }

    /**
     * Finds all computer commands: GET /computercommands.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerCommands(array $options = []): Collection
    {
        return $this->fetch(new FindComputerCommandsRequest($options));
    }

    /**
     * Finds matching computer commands by name: GET /computercommands/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerCommandsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerCommandsByNameRequest($name, $options));
    }

    /**
     * Finds a computer command by uuid: GET /computercommands/uuid/{uuid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerCommandsByUuid(string $uuid, array $options = []): mixed
    {
        return $this->fetch(new FindComputerCommandsByUuidRequest($uuid, $options));
    }
}
