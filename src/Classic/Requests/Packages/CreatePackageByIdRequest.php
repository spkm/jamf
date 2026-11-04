<?php

namespace spkm\Jamf\Classic\Requests\Packages;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new package by id: POST /packages/id/{id}.
 */
class CreatePackageByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'package';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <package>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/packages/id/'.Path::segment((string) $this->id);
    }
}
