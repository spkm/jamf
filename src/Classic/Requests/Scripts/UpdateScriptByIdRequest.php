<?php

namespace spkm\Jamf\Classic\Requests\Scripts;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing script by id: PUT /scripts/id/{id}.
 *
 * Generally only one of script_contents_encoded and script_contents should be submitted.
 */
class UpdateScriptByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
