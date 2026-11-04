<?php

namespace spkm\Jamf\Classic\Requests\SoftwareUpdateServers;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new software update server by id: POST /softwareupdateservers/id/{id}.
 */
class CreateSoftwareUpdateServerByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'software_update_server';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <software_update_server>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/softwareupdateservers/id/'.Path::segment((string) $this->id);
    }
}
