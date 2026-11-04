<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PlanStatus record from the Jamf Pro API.
 */
readonly class PlanStatus extends Data
{
    /**
     * @param  list<string>|null  $errorReasons
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $state = null,
        public ?array $errorReasons = null,
        public array $extra = [],
    ) {}
}
