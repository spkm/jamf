<?php

namespace spkm\Jamf\Classic\Requests\Classes;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new class by id. The mobile device list is not used in the POST, the mobile device group is used instead: POST /classes/id/{id}.
 */
class CreateClassByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'class';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <class>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/classes/id/'.Path::segment((string) $this->id);
    }
}
