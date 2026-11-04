<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyLogEligibleRetryCount record from the Jamf Pro API.
 */
readonly class PatchPolicyLogEligibleRetryCount extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $count = null,
        public array $extra = [],
    ) {}
}
