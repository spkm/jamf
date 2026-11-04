<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SchedulerJobs record from the Jamf Pro API.
 */
readonly class SchedulerJobs extends Data
{
    /**
     * @param  list<string>|null  $jobKeys
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $jobKeys = null,
        public array $extra = [],
    ) {}
}
