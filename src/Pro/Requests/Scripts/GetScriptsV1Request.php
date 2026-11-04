<?php

namespace spkm\Jamf\Pro\Requests\Scripts;

use spkm\Jamf\Pro\Data\Script;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for sorted and paged Scripts: GET /v1/scripts.
 *
 * Search for sorted and paged scripts
 */
class GetScriptsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = Script::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scripts';
    }
}
