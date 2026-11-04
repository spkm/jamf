<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Response object that has lists of information for widgets, and what setup tasks to display.
 */
readonly class DashboardSetup extends Data
{
    /**
     * @param  array<string, mixed>|null  $setupTaskOptions
     * @param  array<string, mixed>|null  $featureOptions
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $setupTaskOptions = null,
        public ?array $featureOptions = null,
        public array $extra = [],
    ) {}
}
