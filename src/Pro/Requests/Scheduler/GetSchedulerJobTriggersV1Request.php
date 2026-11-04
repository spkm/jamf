<?php

namespace spkm\Jamf\Pro\Requests\Scheduler;

use spkm\Jamf\Pro\Data\SchedulerTrigger;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve all triggers for a Jamf Pro Scheduler job: GET /v1/scheduler/jobs/{jobKey}/triggers.
 *
 * Retrieves all triggers for a Jamf Pro Scheduler job
 */
class GetSchedulerJobTriggersV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = SchedulerTrigger::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected string $jobKey, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scheduler/jobs/'.Path::segment((string) $this->jobKey).'/triggers';
    }
}
