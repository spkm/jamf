<?php

namespace spkm\Jamf\Pro\Requests\Categories;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Category record: DELETE /v1/categories/{id}.
 *
 * Removes specified category record
 */
class DeleteCategoryV1Request extends DeleteRequest
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
        return '/v1/categories/'.Path::segment((string) $this->id);
    }
}
