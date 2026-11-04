<?php

namespace spkm\Jamf\Classic\Requests\SoftwareUpdateServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds software update servers by id: GET /softwareupdateservers/id/{id}.
 */
class FindSoftwareUpdateServersByIdRequest extends ClassicGetRequest
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
