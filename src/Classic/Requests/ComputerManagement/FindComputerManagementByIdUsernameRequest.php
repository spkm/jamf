<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display management information for a computer and username: GET /computermanagement/id/{id}/username/{username}.
 *
 * Displays information for a computer specified with the {id} and {username} parameters. Lookup by name, UDID, serial
 * number, or mac address are also supported. For example, /computermanagement/id/3/username/Sally. Computer command
 * information is available in computerhistory.
 */
class FindComputerManagementByIdUsernameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $username, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computermanagement/id/'.Path::segment((string) $this->id).'/username/'.Path::segment((string) $this->username);
    }
}
