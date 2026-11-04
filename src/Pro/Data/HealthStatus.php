<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A HealthStatus record from the Jamf Pro API.
 */
readonly class HealthStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?HealthStatusStats $api = null,
        public ?HealthStatusStats $ui = null,
        public ?HealthStatusStats $enrollment = null,
        public ?HealthStatusStats $device = null,
        public ?HealthStatusStats $default = null,
        public array $extra = [],
    ) {}
}
