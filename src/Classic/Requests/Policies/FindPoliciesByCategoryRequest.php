<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all policies by category: GET /policies/category/{category}.
 *
 * Category may be specified by id or name, or 'None' for policies with no category.
 */
class FindPoliciesByCategoryRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $category, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policies/category/'.Path::segment((string) $this->category);
    }
}
