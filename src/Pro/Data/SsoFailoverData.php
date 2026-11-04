<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SsoFailoverData record from the Jamf Pro API.
 */
readonly class SsoFailoverData extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $failoverUrl = null,
        /** Generation time of failover key */
        public ?int $generationTime = null,
        public array $extra = [],
    ) {}
}
