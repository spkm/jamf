<?php

namespace spkm\Jamf\Query;

use BackedEnum;
use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use LogicException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\JamfApiException;
use spkm\Jamf\JamfPaginator;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Support\Payload;

/**
 * An Eloquent-style query over one Jamf Pro collection. Each resource extends it, saying which requests list,
 * fetch, create, update and delete its records; the builder turns where(), orderBy(), forPage() and sections()
 * into Jamf's filter, sort, page, page-size and section parameters, and the response into models.
 *
 * @template TData of Data
 *
 * @extends BaseResource<TData>
 */
abstract class Builder extends BaseResource
{
    protected Query $query;

    /**
     * @param  class-string<TData>|null  $dataClass  The model records are returned as; null for arrays.
     */
    public function __construct(protected ProConnector $pro, ?string $dataClass)
    {
        parent::__construct($pro, $dataClass);

        $this->query = Query::make();
    }

    abstract protected function listRequest(Query $query): ListRequest;

    protected function itemRequest(int|string $id): ?JamfRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     */
    protected function createRequest(array $body): ?JamfRequest
    {
        return null;
    }

    /**
     * @param  array<string, mixed>  $body
     */
    protected function updateRequest(int|string $id, array $body): ?JamfRequest
    {
        return null;
    }

    protected function deleteRequest(int|string $id): ?JamfRequest
    {
        return null;
    }

    /**
     * A condition on a field: where('general.name', 'iPad 1'), where('id', '>', 100), where('general.assetTag',
     * '!=', 'A*'). Nested fields take dots; a * in a value compared with == or != is a wildcard. Conditions are ANDed.
     */
    public function where(Closure|string $field, mixed $operator = null, mixed $value = null): static
    {
        if ($field instanceof Closure) {
            $this->query = $this->query->withFilter($this->query->filter()->and($this->group($field)));

            return $this;
        }

        if (func_num_args() === 2) {
            [$operator, $value] = [Operator::Equal, $operator];
        }

        $this->query = $this->query->where($field, $operator instanceof Operator ? $operator : Operator::fromString((string) ($operator ?? '==')), $value);

        return $this;
    }

    /**
     * Everything so far, OR this: a condition (orWhere('general.name', 'Lab*')) or a group
     * (orWhere(fn ($query) => ...)).
     */
    public function orWhere(Closure|string $field, mixed $operator = null, mixed $value = null): static
    {
        if ($field instanceof Closure) {
            $this->query = $this->query->withFilter($this->query->filter()->or($this->group($field)));

            return $this;
        }

        $alternative = $this->fresh();
        func_num_args() === 2 ? $alternative->where($field, $operator) : $alternative->where($field, $operator, $value);
        $this->query = $this->query->withFilter($this->query->filter()->or($alternative->toFilter()));

        return $this;
    }

    public function whereNot(string $field, mixed $value): static
    {
        return $this->where($field, Operator::NotEqual, $value);
    }

    /**
     * @param  iterable<mixed>  $values
     */
    public function whereIn(string $field, iterable $values): static
    {
        return $this->where($field, Operator::In, $values);
    }

    /**
     * @param  iterable<mixed>  $values
     */
    public function whereNotIn(string $field, iterable $values): static
    {
        return $this->where($field, Operator::NotIn, $values);
    }

    /**
     * @param  array{mixed, mixed}  $range
     */
    public function whereBetween(string $field, array $range): static
    {
        [$from, $to] = $range;

        return $this->where($field, Operator::GreaterOrEqual, $from)->where($field, Operator::LessOrEqual, $to);
    }

    /**
     * The value has the given text somewhere in it: a == comparison with the text between * wildcards. A * in the
     * text itself is a wildcard too.
     */
    public function whereContains(string $field, string $value): static
    {
        return $this->where($field, Operator::Equal, '*'.$value.'*');
    }

    public function orderBy(string $field, string $direction = 'asc'): static
    {
        $this->query = $this->query->orderBy($field, $direction);

        return $this;
    }

    public function orderByDesc(string $field): static
    {
        return $this->orderBy($field, 'desc');
    }

    /**
     * How many records to return: the first page of that size.
     */
    public function limit(int $limit): static
    {
        $this->query = $this->query->pageSize(min($limit, JamfPaginator::MAX_PAGE_SIZE));

        return $this;
    }

    /**
     * One page of records, counting pages from 1 as Laravel does (Jamf counts from 0).
     */
    public function forPage(int $page, int $perPage): static
    {
        $this->query = $this->query->page(max(0, $page - 1))->pageSize(min($perPage, JamfPaginator::MAX_PAGE_SIZE));

        return $this;
    }

    /**
     * The sections of an inventory record to return, such as ['GENERAL', 'HARDWARE', 'USER_AND_LOCATION'];
     * Jamf returns GENERAL alone when not told.
     *
     * @param  iterable<string|BackedEnum>|string  $sections
     */
    public function sections(iterable|string ...$sections): static
    {
        $flat = [];

        foreach ($sections as $section) {
            foreach (is_iterable($section) ? $section : [$section] as $item) {
                $flat[] = $item;
            }
        }

        $this->query = $this->query->sections($flat);

        return $this;
    }

    /**
     * Another query parameter the endpoint documents, such as with('exception-handling', 'LENIENT').
     */
    public function withParameter(string $parameter, mixed $value): static
    {
        $this->query = $this->query->with($parameter, $value);

        return $this;
    }

    /**
     * The matching records: the page limit() or forPage() asked for, or all of them.
     *
     * @return Collection<int, TData>
     */
    public function get(): Collection
    {
        if ($this->query->getPageSize() === null) {
            return $this->all();
        }

        /** @var Collection<int, TData> */
        return Payload::items($this->send($this->query), $this->dataClass);
    }

    /**
     * Every matching record, fetched a page at a time.
     *
     * @return Collection<int, TData>
     */
    public function all(?int $perPage = null): Collection
    {
        return $this->lazy($perPage)->collect();
    }

    /**
     * The first matching record in sort order.
     *
     * @return TData|null
     */
    public function first(): mixed
    {
        return Payload::object($this->send($this->query->page(0)->pageSize(1)), $this->dataClass);
    }

    /**
     * How many records match, from the totalCount of a page of one.
     */
    public function count(): int
    {
        $response = $this->send($this->query->page(0)->pageSize(1));

        return Payload::total($response) ?? count(Payload::records($response));
    }

    public function exists(): bool
    {
        return $this->count() > 0;
    }

    /**
     * The record with the given id, or null when Jamf has none.
     *
     * @return TData|null
     */
    public function find(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            return $this->fresh()->where('id', (string) $id)->first();
        }

        return $this->fetchOrNull($request);
    }

    /**
     * @return TData
     */
    public function findOrFail(int|string $id): mixed
    {
        $request = $this->itemRequest($id);

        if ($request === null) {
            $record = $this->find($id);

            if ($record === null) {
                throw new NotFoundException($this->send($this->fresh()->where('id', (string) $id)->toQuery()->page(0)->pageSize(1)));
            }

            return $record;
        }

        return $this->fetch($request) ?? throw new NotFoundException($this->connector->send($request));
    }

    /**
     * Every matching record, fetched a page at a time as the loop reaches it.
     *
     * @return LazyCollection<int, TData>
     */
    public function lazy(?int $perPage = null): LazyCollection
    {
        $paginator = $this->paginate($perPage);
        $dataClass = $this->dataClass;

        return LazyCollection::make(function () use ($paginator, $dataClass) {
            try {
                foreach ($dataClass === null ? $paginator->collect() : $paginator->models($dataClass) as $item) {
                    yield $item;
                }
            } catch (RequestException $exception) {
                throw $exception instanceof JamfApiException ? $exception : JamfApiException::fromResponse($exception->getResponse());
            }
        });
    }

    /**
     * @return LazyCollection<int, TData>
     */
    public function cursor(?int $perPage = null): LazyCollection
    {
        return $this->lazy($perPage);
    }

    /**
     * A paginator over the matching records, for fetching pages one at a time yourself.
     */
    public function paginate(?int $perPage = null): JamfPaginator
    {
        return $this->pro->paginate($this->checked($this->listRequest($this->query->withoutPaging())), $perPage ?? $this->query->getPageSize());
    }

    /**
     * Create a record. Jamf answers with the record it stored, or a link to it ({"id", "href"}).
     *
     * @param  array<string, mixed>|Data  $attributes
     */
    public function create(array|Data $attributes): mixed
    {
        return $this->fetch($this->createRequest($this->payloadOf($attributes)) ?? $this->undocumented('create'));
    }

    /**
     * Change a record. Jamf answers with the record as updated.
     *
     * @param  array<string, mixed>|Data  $attributes
     */
    public function update(int|string $id, array|Data $attributes): mixed
    {
        return $this->fetch($this->updateRequest($id, $this->payloadOf($attributes)) ?? $this->undocumented('update'));
    }

    public function delete(int|string $id): bool
    {
        $this->fetch($this->deleteRequest($id) ?? $this->undocumented('delete'));

        return true;
    }

    /**
     * The request get() would send, for sending through the connector yourself.
     */
    public function toRequest(): ListRequest
    {
        return $this->checked($this->listRequest($this->query));
    }

    public function toQuery(): Query
    {
        return $this->query;
    }

    public function toFilter(): Filter
    {
        return $this->query->filter();
    }

    /**
     * The query parameters get() would send.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return $this->query->toArray();
    }

    protected function send(Query $query): Response
    {
        $response = $this->connector->send($this->checked($this->listRequest($query)));

        if (! $response->successful()) {
            throw JamfApiException::fromResponse($response);
        }

        return $response;
    }

    /**
     * The request, refused when the query asks for what its endpoint doesn't take, rather than sent for Jamf to
     * ignore the filter and answer every record.
     */
    protected function checked(ListRequest $request): ListRequest
    {
        $endpoint = $request->getMethod()->value.' '.$request->resolveEndpoint();

        if (! $this->query->filter()->isEmpty() && ! $request->filterable()) {
            throw new LogicException("Jamf's $endpoint takes no filter.");
        }

        if ($this->query->getSort() !== [] && ! $request->sortable()) {
            throw new LogicException("Jamf's $endpoint takes no sort.");
        }

        if ($this->query->getSections() !== [] && ! $request->sectioned()) {
            throw new LogicException("Jamf's $endpoint takes no sections.");
        }

        return $request;
    }

    /**
     * A copy of this builder with no conditions, for building a group or an alternative.
     */
    protected function fresh(): static
    {
        $fresh = clone $this;
        $fresh->query = Query::make();

        return $fresh;
    }

    private function group(Closure $callback): Filter
    {
        $group = $this->fresh();
        $callback($group);

        return $group->toFilter();
    }

    private function undocumented(string $action): never
    {
        throw new LogicException("Jamf's API documents no way to $action these records here.");
    }
}
