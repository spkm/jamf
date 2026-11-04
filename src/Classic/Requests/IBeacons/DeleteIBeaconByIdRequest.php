<?php

namespace spkm\Jamf\Classic\Requests\IBeacons;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes an iBeacon region by id: DELETE /ibeacons/id/{id}.
 */
class DeleteIBeaconByIdRequest extends ClassicDeleteRequest
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
