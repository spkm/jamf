<?php

namespace spkm\Jamf\Classic\Requests\Sites;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new site by id: POST /sites/id/{id}.
 */
class CreateSiteByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'site';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <site>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/sites/id/'.Path::segment((string) $this->id);
    }
}
