<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Pro\Data\Ebook;
use spkm\Jamf\Pro\Data\EbookScope;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbookScopeV1Request;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbooksV1Request;
use spkm\Jamf\Pro\Requests\Ebooks\GetEbookV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The ebooks endpoints of the Jamf Pro API, from Jamf::ebooks().
 *
 * @extends Builder<Ebook>
 */
class EbooksResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Ebook::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEbooksV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetEbookV1Request($id);
    }

    /**
     * Get specified scope of Ebook object: GET /v1/ebooks/{id}/scope.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEbookScopeV1(int|string $id, array $options = []): ?EbookScope
    {
        return $this->fetch(new GetEbookScopeV1Request($id, $options));
    }

    /**
     * Get specified Ebook object: GET /v1/ebooks/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getEbookV1(int|string $id, array $options = []): ?Ebook
    {
        return $this->fetch(new GetEbookV1Request($id, $options));
    }

    /**
     * Get Ebook object: GET /v1/ebooks.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Ebook>
     */
    public function getEbooksV1(): PagedResource
    {
        return new PagedResource($this->pro(), Ebook::class, fn (Query $query) => new GetEbooksV1Request($query));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
