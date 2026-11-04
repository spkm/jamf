<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AvailableUpdates record from the Jamf Pro API.
 */
readonly class AvailableUpdates extends Data
{
    /**
     * @param  list<string>|null  $availableUpdates
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $availableUpdates = null,
        public array $extra = [],
    ) {}
}
