<?php

namespace spkm\Jamf\Pro\Requests\DistributionPoint;

use spkm\Jamf\Pro\Data\DistributionPoint;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Finds all Distribution Points: GET /v1/distribution-points.
 */
class GetDistributionPointsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = DistributionPoint::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/distribution-points';
    }
}
