<?php

namespace spkm\Jamf\Classic\Requests\IBeacons;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds iBeacon regions by id: GET /ibeacons/id/{id}.
 */
class FindIBeaconsByIdRequest extends ClassicGetRequest
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
        return '/ibeacons/id/'.Path::segment((string) $this->id);
    }
}
