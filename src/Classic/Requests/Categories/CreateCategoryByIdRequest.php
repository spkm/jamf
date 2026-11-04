<?php

namespace spkm\Jamf\Classic\Requests\Categories;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new category by id: POST /categories/id/{id}.
 */
class CreateCategoryByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'category';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <category>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/categories/id/'.Path::segment((string) $this->id);
    }
}
