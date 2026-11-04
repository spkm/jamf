<?php

namespace spkm\Jamf\Classic\Requests\SoftwareUpdateServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds software update servers by name: GET /softwareupdateservers/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindSoftwareUpdateServersByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/softwareupdateservers/name/'.Path::segment((string) $this->name);
    }
}
