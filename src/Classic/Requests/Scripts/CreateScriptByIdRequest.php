<?php

namespace spkm\Jamf\Classic\Requests\Scripts;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new script by id: POST /scripts/id/{id}.
 *
 * Generally only one of script_contents_encoded and script_contents should be submitted.
 */
class CreateScriptByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'script';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <script>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/scripts/id/'.Path::segment((string) $this->id);
    }
}
