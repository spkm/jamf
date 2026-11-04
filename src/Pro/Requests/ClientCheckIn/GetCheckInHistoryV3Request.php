<?php

namespace spkm\Jamf\Pro\Requests\ClientCheckIn;

use spkm\Jamf\Pro\Data\ObjectHistoryV1;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Client Check-In history object: GET /v3/check-in/history.
 *
 * Gets Client Check-In history object
 */
class GetCheckInHistoryV3Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ObjectHistoryV1::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/check-in/history';
    }
}
