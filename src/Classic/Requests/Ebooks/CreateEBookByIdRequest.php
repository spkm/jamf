<?php

namespace spkm\Jamf\Classic\Requests\Ebooks;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new ebook by id: POST /ebooks/id/{id}.
 */
class CreateEBookByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'ebook';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <ebook>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/ebooks/id/'.Path::segment((string) $this->id);
    }
}
