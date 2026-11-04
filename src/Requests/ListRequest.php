<?php

namespace spkm\Jamf\Requests;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\Jamf\Query\Query;

/**
 * A GET for a page of a collection's records, filtered, sorted and paged by a Query. Jamf answers {"totalCount",
 * "results"} with the first 100 matching records unless told otherwise; JamfPaginator pages through them all.
 */
abstract class ListRequest extends JamfRequest implements Paginatable
{
    protected Method $method = Method::GET;

    protected string $responseShape = self::LIST;

    protected bool $cacheable = true;

    /**
     * Whether the endpoint takes an RSQL filter.
     */
    protected bool $filterable = false;

    /**
     * Whether the endpoint takes a sort.
     */
    protected bool $sortable = false;

    /**
     * Whether the endpoint takes the section parameter.
     */
    protected bool $sectioned = false;

    /** @var Query|array<string, mixed> */
    protected Query|array $parameters;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        $this->parameters = $query;
    }

    public function filterable(): bool
    {
        return $this->filterable;
    }

    public function sortable(): bool
    {
        return $this->sortable;
    }

    public function sectioned(): bool
    {
        return $this->sectioned;
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return $this->parameters instanceof Query ? $this->parameters->toArray() : $this->parameters;
    }
}
