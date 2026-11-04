<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A RetentionPolicyV1 record from the Jamf Pro API.
 */
readonly class RetentionPolicyV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $qualifier = null,
        public ?int $retentionPeriod = null,
        /** The unit of the retention period (eg: DAY, WEEK, MONTH, YEAR) */
        public ?string $retentionPeriodUnit = null,
        public array $extra = [],
    ) {}
}
