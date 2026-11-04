<?php

namespace spkm\Jamf\Classic\Requests\SoftwareUpdateServers;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a software update server by id: DELETE /softwareupdateservers/id/{id}.
 */
class DeleteSoftwareUpdateServerByIdRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/softwareupdateservers/id/'.Path::segment((string) $this->id);
    }
}
