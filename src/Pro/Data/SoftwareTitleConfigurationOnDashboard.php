<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SoftwareTitleConfigurationOnDashboard record from the Jamf Pro API.
 */
readonly class SoftwareTitleConfigurationOnDashboard extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $onDashboard = null,
        public array $extra = [],
    ) {}
}
