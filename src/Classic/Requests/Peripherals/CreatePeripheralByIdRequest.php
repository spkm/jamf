<?php

namespace spkm\Jamf\Classic\Requests\Peripherals;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new peripheral by id: POST /peripherals/id/{id}.
 */
class CreatePeripheralByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'peripheral';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <peripheral>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/peripherals/id/'.Path::segment((string) $this->id);
    }
}
