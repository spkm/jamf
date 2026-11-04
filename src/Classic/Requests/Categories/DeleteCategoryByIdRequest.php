<?php

namespace spkm\Jamf\Classic\Requests\Categories;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a category by id: DELETE /categories/id/{id}.
 */
class DeleteCategoryByIdRequest extends ClassicDeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/categories/id/'.Path::segment((string) $this->id);
    }
}
