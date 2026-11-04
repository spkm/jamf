<?php

namespace spkm\Jamf\Pro\Requests\Scheduler;

use spkm\Jamf\Pro\Data\SchedulerSummary;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve a summary of the Jamf Pro Scheduler: GET /v1/scheduler/summary.
 *
 * Retrieves a summary of the Jamf Pro Scheduler
 */
class GetSchedulerSummaryV1Request extends GetRequest
{
    protected ?string $dto = SchedulerSummary::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/scheduler/summary';
    }
}
