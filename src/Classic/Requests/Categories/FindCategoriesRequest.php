<?php

namespace spkm\Jamf\Classic\Requests\Categories;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all categories: GET /categories.
 */
class FindCategoriesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/categories';
    }
}
