<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A BlankPushResponse record from the Jamf Pro API.
 */
readonly class BlankPushResponse extends Data
{
    /**
     * @param  list<string>|null  $errorUuids
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $errorUuids = null,
        public array $extra = [],
    ) {}
}
