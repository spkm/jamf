<?php

namespace spkm\Jamf\Pro\Requests\Ebooks;

use spkm\Jamf\Pro\Data\Ebook;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Ebook object: GET /v1/ebooks.
 *
 * Gets ebook object
 */
class GetEbooksV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = Ebook::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ebooks';
    }
}
