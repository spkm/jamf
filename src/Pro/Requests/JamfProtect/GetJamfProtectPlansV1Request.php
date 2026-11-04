<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use spkm\Jamf\Pro\Data\JamfProtectPlan;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get all of the previously synced Jamf Protect Plans with information about their associated configuration profile: GET /v1/jamf-protect/plans.
 */
class GetJamfProtectPlansV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = JamfProtectPlan::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-protect/plans';
    }
}
