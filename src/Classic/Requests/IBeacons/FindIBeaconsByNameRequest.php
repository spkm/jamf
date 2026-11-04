<?php

namespace spkm\Jamf\Classic\Requests\IBeacons;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds iBeacon regions by name: GET /ibeacons/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindIBeaconsByNameRequest extends ClassicGetRequest
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
        return '/ibeacons/name/'.Path::segment((string) $this->name);
    }
}
