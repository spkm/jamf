<?php

namespace spkm\Jamf;

use Illuminate\Support\LazyCollection;
use JsonException;
use LogicException;
use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Support\Payload;

/**
 * Pages through a Jamf Pro list with its page (counting from 0) and page-size parameters, stopping at an empty or
 * short page or once the records fetched reach the totalCount Jamf gave.
 */
class JamfPaginator extends Paginator
{
    /**
     * The most records Jamf returns on one page.
     */
    public const MAX_PAGE_SIZE = 2000;

    protected ?int $perPageLimit = 100;

    protected ?string $lastPageFingerprint = null;

    protected ?Response $lastResponse = null;

    /** @var list<array<string, mixed>> */
    protected array $lastItems = [];

    public function __construct(Connector $connector, Request $request, ?int $perPage = null)
    {
        parent::__construct($connector, $request);

        if ($perPage !== null) {
            $this->perPageLimit = max(1, min($perPage, self::MAX_PAGE_SIZE));
        }
    }

    /**
     * Every item on every page, as the request's models.
     *
     * @return LazyCollection<int, Data>
     */
    public function dtos(): LazyCollection
    {
        $request = $this->getOriginalRequest();
        $dto = $request instanceof JamfRequest ? $request->dtoClass() : null;

        if ($dto === null) {
            throw new LogicException(class_basename($request).' has no model; use collect() for its items as arrays.');
        }

        return $this->models($dto);
    }

    /**
     * Every item on every page as the given model.
     *
     * @template TModel of Data
     *
     * @param  class-string<TModel>  $model
     * @return LazyCollection<int, TModel>
     */
    public function models(string $model): LazyCollection
    {
        return $this->collect()->map(fn (array $item) => $model::from($item));
    }

    protected function applyPagination(Request $request): Request
    {
        $request->query()->add('page', $this->page - 1);

        if ($this->perPageLimit !== null) {
            $request->query()->add('page-size', $this->perPageLimit);
        }

        return $request;
    }

    protected function isLastPage(Response $response): bool
    {
        $items = $this->getPageItems($response, $response->getRequest());

        if ($items === [] || ($this->perPageLimit !== null && count($items) < $this->perPageLimit)) {
            return true;
        }

        try {
            $total = Payload::total($response);
        } catch (JsonException) {
            return true;
        }

        return $total !== null && $this->totalResults >= $total;
    }

    protected function onRewind(): void
    {
        $this->lastPageFingerprint = null;
        $this->lastResponse = null;
        $this->lastItems = [];
    }

    /**
     * @return list<array<string, mixed>>
     */
    protected function getPageItems(Response $response, Request $request): array
    {
        if (! $response->successful()) {
            throw JamfApiException::fromResponse($response);
        }

        if ($response === $this->lastResponse) {
            return $this->lastItems;
        }

        try {
            $items = Payload::records($response);
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }

        // An endpoint that ignores page would answer the same page forever: a repeated page is the end.
        $fingerprint = sha1((string) json_encode($items));
        $this->lastResponse = $response;
        $this->lastItems = $fingerprint === $this->lastPageFingerprint ? [] : $items;
        $this->lastPageFingerprint = $fingerprint;

        return $this->lastItems;
    }

    /**
     * How many pages there are, from the totalCount Jamf gives with each page.
     */
    protected function getTotalPages(Response $response): int
    {
        try {
            $total = Payload::total($response) ?? count(Payload::records($response));
        } catch (JsonException) {
            throw new ServerErrorException($response);
        }

        return $this->perPageLimit === null ? 1 : (int) ceil($total / $this->perPageLimit);
    }
}
