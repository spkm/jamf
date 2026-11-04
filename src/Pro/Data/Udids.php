<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Udids record from the Jamf Pro API.
 */
readonly class Udids extends Data
{
    /**
     * @param  list<string>|null  $udids
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $udids = null,
        public array $extra = [],
    ) {}
}
