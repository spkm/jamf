<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SchedulerSummary record from the Jamf Pro API.
 */
readonly class SchedulerSummary extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $numberOfPendingJobs = null,
        public ?int $numberOfExecutingJobs = null,
        public ?int $numberOfExecutedJobs = null,
        public ?bool $started = null,
        public array $extra = [],
    ) {}
}
