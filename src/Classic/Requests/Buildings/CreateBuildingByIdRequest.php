<?php

namespace spkm\Jamf\Classic\Requests\Buildings;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new building by id: POST /buildings/id/{id}.
 */
class CreateBuildingByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'building';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <building>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/buildings/id/'.Path::segment((string) $this->id);
    }
}
