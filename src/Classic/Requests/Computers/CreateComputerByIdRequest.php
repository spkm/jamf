<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a computer by specifying an id of 0: POST /computers/id/{id}.
 *
 * You can POST using the resource URLs with parameters of {name}, {udid}, {serial number}, or {macaddress}.
 * Certificates and mdm_capable are ignored in a POST.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-03-07.
 */
class CreateComputerByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'computer';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/id/'.Path::segment((string) $this->id);
    }
}
