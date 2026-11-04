<?php

namespace spkm\Jamf\Classic\Requests\RestrictedSoftware;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new restricted software by id: POST /restrictedsoftware/id/{id}.
 */
class CreateRestrictedSoftwareByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'restricted_software';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <restricted_software>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/restrictedsoftware/id/'.Path::segment((string) $this->id);
    }
}
