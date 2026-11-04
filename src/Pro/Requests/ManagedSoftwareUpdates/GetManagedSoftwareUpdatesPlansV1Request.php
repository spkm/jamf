<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlan;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Managed Software Update Plans: GET /v1/managed-software-updates/plans.
 */
class GetManagedSoftwareUpdatesPlansV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = ManagedSoftwareUpdatePlan::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans';
    }
}
