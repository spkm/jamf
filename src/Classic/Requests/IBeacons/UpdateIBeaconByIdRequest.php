<?php

namespace spkm\Jamf\Classic\Requests\IBeacons;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing iBeacon region by id: PUT /ibeacons/id/{id}.
 */
class UpdateIBeaconByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'ibeacon';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <ibeacon>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/ibeacons/id/'.Path::segment((string) $this->id);
    }
}
