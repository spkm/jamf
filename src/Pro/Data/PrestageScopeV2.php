<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PrestageScopeV2 record from the Jamf Pro API.
 */
readonly class PrestageScopeV2 extends Data
{
    /**
     * @param  array<string, mixed>|null  $serialsByPrestageId
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $serialsByPrestageId = null,
        public array $extra = [],
    ) {}
}
