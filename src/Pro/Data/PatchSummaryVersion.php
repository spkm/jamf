<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchSummaryVersion record from the Jamf Pro API.
 */
readonly class PatchSummaryVersion extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $absoluteOrderId = null,
        public ?string $version = null,
        public ?int $onVersion = null,
        public array $extra = [],
    ) {}
}
