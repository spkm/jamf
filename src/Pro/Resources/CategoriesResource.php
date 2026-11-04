<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\Category;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Categories\CreateCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\CreateCategoryHistoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\DeleteCategoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\DeleteMultipleCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoriesV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoryHistoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\GetCategoryV1Request;
use spkm\Jamf\Pro\Requests\Categories\ReplaceCategoryV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The categories endpoints of the Jamf Pro API, from Jamf::categories().
 *
 * @extends Builder<Category>
 */
class CategoriesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Category::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCategoriesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetCategoryV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateCategoriesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceCategoryV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteCategoryV1Request($id);
    }

    /**
     * Create Category record: POST /v1/categories.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCategoriesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateCategoriesV1Request($body, $options));
    }

    /**
     * Add specified Category history object notes: POST /v1/categories/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCategoryHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateCategoryHistoryV1Request($id, $body, $options));
    }

    /**
     * Remove specified Category record: DELETE /v1/categories/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCategoryV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteCategoryV1Request($id, $options));
    }

    /**
     * Delete multiple Categories by their IDs: POST /v1/categories/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleCategoriesV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleCategoriesV1Request($body, $options));
    }

    /**
     * Get Category objects: GET /v1/categories.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Category>
     */
    public function getCategoriesV1(): PagedResource
    {
        return new PagedResource($this->pro(), Category::class, fn (Query $query) => new GetCategoriesV1Request($query));
    }

    /**
     * Get specified Category history object: GET /v1/categories/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getCategoryHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetCategoryHistoryV1Request($id, $query));
    }

    /**
     * Get specified Category object: GET /v1/categories/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCategoryV1(int|string $id, array $options = []): ?Category
    {
        return $this->fetch(new GetCategoryV1Request($id, $options));
    }

    /**
     * Update specified Category object: PUT /v1/categories/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceCategoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?Category
    {
        return $this->fetch(new ReplaceCategoryV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
