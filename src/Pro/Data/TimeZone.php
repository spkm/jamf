<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A TimeZone record from the Jamf Pro API.
 */
readonly class TimeZone extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $zoneId = null,
        public ?string $region = null,
        public ?string $displayName = null,
        public array $extra = [],
    ) {}
}
