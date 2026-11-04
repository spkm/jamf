<?php

namespace spkm\Jamf\Classic\Requests\Categories;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds categories by id: GET /categories/id/{id}.
 */
class FindCategoriesByIdRequest extends ClassicGetRequest
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
