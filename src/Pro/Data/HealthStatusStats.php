<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A HealthStatusStats record from the Jamf Pro API.
 */
readonly class HealthStatusStats extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Percentage of accepted requests out of total requests for the last 30 seconds */
        public ?float $thirtySeconds = null,
        /** Percentage of accepted requests out of total requests for the last 1 minute */
        public ?float $oneMinute = null,
        /** Percentage of accepted requests out of total requests for the last 5 minutes */
        public ?float $fiveMinutes = null,
        /** Percentage of accepted requests out of total requests for the last 15 minutes */
        public ?float $fifteenMinutes = null,
        /** Percentage of accepted requests out of total requests for the last 30 minutes */
        public ?float $thirtyMinutes = null,
        public array $extra = [],
    ) {}
}
