<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get sorted and paged Enrollment history object: GET /v2/enrollment/history.
 *
 * Gets sorted and paged Enrollment history object
 */
class GetEnrollmentHistoryV2Request extends ListRequest
{
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
        return '/v2/enrollment/history';
    }
}
