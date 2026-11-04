<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\Categories\CreateCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\DeleteCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesByIdRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesByNameRequest;
use spkm\Jamf\Classic\Requests\Categories\FindCategoriesRequest;
use spkm\Jamf\Classic\Requests\Categories\UpdateCategoryByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicRequest;

/**
 * The categories endpoints of the Classic API, from Jamf::classic()->categories().
 */
class CategoriesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindCategoriesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindCategoriesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateCategoryByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateCategoryByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteCategoryByIdRequest($id);
    }

    /**
     * Creates a new category by id: POST /categories/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <category>), or the XML itself.
     */
    public function createCategoryById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateCategoryByIdRequest($id, $record));
    }

    /**
     * Deletes a category by id: DELETE /categories/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCategoryById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteCategoryByIdRequest($id, $options));
    }

    /**
     * Finds all categories: GET /categories.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findCategories(array $options = []): Collection
    {
        return $this->fetch(new FindCategoriesRequest($options));
    }

    /**
     * Finds categories by id: GET /categories/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findCategoriesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindCategoriesByIdRequest($id, $options));
    }

    /**
     * Finds categories by name: GET /categories/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findCategoriesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindCategoriesByNameRequest($name, $options));
    }

    /**
     * Updates an existing category by id: PUT /categories/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <category>), or the XML itself.
     */
    public function updateCategoryById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateCategoryByIdRequest($id, $record));
    }
}
