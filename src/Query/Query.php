<?php

namespace spkm\Jamf\Query;

use InvalidArgumentException;
use spkm\Jamf\Support\QueryString;
use Stringable;

/**
 * The query string of a Jamf Pro list request, built up immutably: filter (RSQL), sort (field:asc, comma
 * separated), page (counting from 0), page-size, section (repeated, for the inventory endpoints) and any other
 * parameter the endpoint documents.
 */
final class Query implements Stringable
{
    private Filter $filter;

    /** @var list<string> */
    private array $sort = [];

    private ?int $page = null;

    private ?int $pageSize = null;

    /** @var list<string> */
    private array $sections = [];

    /** @var array<string, mixed> */
    private array $parameters = [];

    public function __construct(?Filter $filter = null)
    {
        $this->filter = $filter ?? Filter::make();
    }

    public static function make(): self
    {
        return new self;
    }

    public function filter(): Filter
    {
        return $this->filter;
    }

    public function withFilter(Filter $filter): self
    {
        $query = clone $this;
        $query->filter = $filter;

        return $query;
    }

    /**
     * A comparison, ANDed with the ones before it.
     */
    public function where(string $field, Operator|string $operator, mixed $value = null): self
    {
        return $this->withFilter($this->filter->where($field, $operator, $value));
    }

    /**
     * Sort by a field, after any sort already given.
     */
    public function orderBy(string $field, string $direction = 'asc'): self
    {
        $direction = strtolower($direction);

        if (! in_array($direction, ['asc', 'desc'], true)) {
            throw new InvalidArgumentException('Sort direction must be "asc" or "desc", not "'.$direction.'".');
        }

        $query = clone $this;
        $query->sort[] = Filter::field($field).':'.$direction;

        return $query;
    }

    /**
     * The page to fetch, counting from 0 as Jamf does.
     */
    public function page(?int $page): self
    {
        if ($page !== null && $page < 0) {
            throw new InvalidArgumentException('The page cannot be negative; Jamf counts pages from 0.');
        }

        $query = clone $this;
        $query->page = $page;

        return $query;
    }

    /**
     * How many records a page holds; Jamf takes up to 2000 and gives 100 when not told.
     */
    public function pageSize(?int $pageSize): self
    {
        if ($pageSize !== null && $pageSize < 1) {
            throw new InvalidArgumentException('The page size must be at least 1.');
        }

        $query = clone $this;
        $query->pageSize = $pageSize;

        return $query;
    }

    /**
     * The sections of an inventory record to return (GENERAL, HARDWARE, USER_AND_LOCATION, ...); Jamf returns
     * GENERAL alone when not told.
     *
     * @param  iterable<string|\BackedEnum>  $sections
     */
    public function sections(iterable $sections): self
    {
        $query = clone $this;
        $query->sections = [];

        foreach ($sections as $section) {
            $query->sections[] = strtoupper((string) ($section instanceof \BackedEnum ? $section->value : $section));
        }

        return $query;
    }

    /**
     * Another query parameter the endpoint documents, such as exception-handling.
     */
    public function with(string $parameter, mixed $value): self
    {
        $query = clone $this;
        $query->parameters[$parameter] = $value;

        return $query;
    }

    /**
     * The query without its paging, for a paginator to page itself.
     */
    public function withoutPaging(): self
    {
        return $this->page(null)->pageSize(null);
    }

    /**
     * @return list<string>
     */
    public function getSort(): array
    {
        return $this->sort;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    /**
     * @return list<string>
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * The query parameters Jamf reads; section is a list, written as section=GENERAL&section=HARDWARE.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $query = $this->parameters;

        if ($this->sections !== []) {
            $query['section'] = $this->sections;
        }

        if (! $this->filter->isEmpty()) {
            $query['filter'] = $this->filter->toString();
        }

        if ($this->sort !== []) {
            $query['sort'] = implode(',', $this->sort);
        }

        if ($this->page !== null) {
            $query['page'] = $this->page;
        }

        if ($this->pageSize !== null) {
            $query['page-size'] = $this->pageSize;
        }

        return $query;
    }

    /**
     * The query string as you would read it, unencoded, for logs and debugging.
     */
    public function __toString(): string
    {
        return urldecode(QueryString::encode($this->toArray()));
    }
}
