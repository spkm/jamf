<?php

namespace spkm\Jamf\Pro\Requests\Categories;

use spkm\Jamf\Pro\Data\Category;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Category objects: GET /v1/categories.
 *
 * Gets `Category` objects.
 */
class GetCategoriesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = Category::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/categories';
    }
}
