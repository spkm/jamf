<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyV2OnDashboard record from the Jamf Pro API.
 */
readonly class PatchPolicyV2OnDashboard extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $onDashboard = null,
        public array $extra = [],
    ) {}
}
