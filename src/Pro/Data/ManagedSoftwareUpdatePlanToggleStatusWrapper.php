<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlanToggleStatusWrapper record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlanToggleStatusWrapper extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?ManagedSoftwareUpdatePlanToggleStatus $toggleOn = null,
        public ?ManagedSoftwareUpdatePlanToggleStatus $toggleOff = null,
        public array $extra = [],
    ) {}
}
