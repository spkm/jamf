<?php

namespace spkm\Jamf\Classic\Requests\Printers;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new printer by id: POST /printers/id/{id}.
 */
class CreatePrinterByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'printer';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <printer>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/printers/id/'.Path::segment((string) $this->id);
    }
}
