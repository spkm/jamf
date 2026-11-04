<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PlanDeviceResponse record from the Jamf Pro API.
 */
readonly class PlanDeviceResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?PlanDevice $device = null,
        public ?string $planId = null,
        public ?string $href = null,
        public array $extra = [],
    ) {}
}
