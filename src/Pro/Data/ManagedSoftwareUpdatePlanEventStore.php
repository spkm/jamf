<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlanEventStore record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlanEventStore extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $events = null,
        public array $extra = [],
    ) {}
}
