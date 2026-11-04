<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SchedulerJobs;
use spkm\Jamf\Pro\Data\SchedulerSummary;
use spkm\Jamf\Pro\Data\SchedulerTrigger;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerJobsV1Request;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerJobTriggersV1Request;
use spkm\Jamf\Pro\Requests\Scheduler\GetSchedulerSummaryV1Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The scheduler endpoints of the Jamf Pro API, from Jamf::scheduler().
 *
 * @extends BaseResource<Data>
 */
class SchedulerResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve all triggers for a Jamf Pro Scheduler job: GET /v1/scheduler/jobs/{jobKey}/triggers.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SchedulerTrigger>
     */
    public function getSchedulerJobTriggersV1(string $jobKey): PagedResource
    {
        return new PagedResource($this->pro(), SchedulerTrigger::class, fn (Query $query) => new GetSchedulerJobTriggersV1Request($jobKey, $query));
    }

    /**
     * Retrieve all Jamf Pro Scheduler jobs: GET /v1/scheduler/jobs.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSchedulerJobsV1(array $options = []): ?SchedulerJobs
    {
        return $this->fetch(new GetSchedulerJobsV1Request($options));
    }

    /**
     * Retrieve a summary of the Jamf Pro Scheduler: GET /v1/scheduler/summary.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSchedulerSummaryV1(array $options = []): ?SchedulerSummary
    {
        return $this->fetch(new GetSchedulerSummaryV1Request($options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
