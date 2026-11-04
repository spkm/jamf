<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Session record from the Jamf Pro API.
 */
readonly class Session extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $currentSiteId = null,
        public array $extra = [],
    ) {}
}
