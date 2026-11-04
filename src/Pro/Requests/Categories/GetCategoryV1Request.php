<?php

namespace spkm\Jamf\Pro\Requests\Categories;

use spkm\Jamf\Pro\Data\Category;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Category object: GET /v1/categories/{id}.
 *
 * Gets specified Category object
 */
class GetCategoryV1Request extends GetRequest
{
    protected ?string $dto = Category::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/categories/'.Path::segment((string) $this->id);
    }
}
