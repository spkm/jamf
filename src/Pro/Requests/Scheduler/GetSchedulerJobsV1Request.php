<?php

namespace spkm\Jamf\Pro\Requests\Scheduler;

use spkm\Jamf\Pro\Data\SchedulerJobs;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve all Jamf Pro Scheduler jobs: GET /v1/scheduler/jobs.
 *
 * Retrieves the names of all Jamf Pro Scheduler jobs
 */
class GetSchedulerJobsV1Request extends GetRequest
{
    protected ?string $dto = SchedulerJobs::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scheduler/jobs';
    }
}
