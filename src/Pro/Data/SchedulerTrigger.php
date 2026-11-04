<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A SchedulerTrigger record from the Jamf Pro API.
 */
readonly class SchedulerTrigger extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $triggerKey = null,
        public ?CarbonImmutable $previousFireTime = null,
        public ?CarbonImmutable $nextFireTime = null,
        public array $extra = [],
    ) {}
}
