<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Jamf Protect history: GET /v1/jamf-protect/history.
 */
class GetJamfProtectHistoryV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-protect/history';
    }
}
