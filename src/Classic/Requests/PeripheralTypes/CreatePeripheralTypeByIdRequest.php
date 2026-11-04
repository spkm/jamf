<?php

namespace spkm\Jamf\Classic\Requests\PeripheralTypes;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new peripheral by id: POST /peripheraltypes/id/{id}.
 */
class CreatePeripheralTypeByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'peripheral_type';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <peripheral_type>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/peripheraltypes/id/'.Path::segment((string) $this->id);
    }
}
