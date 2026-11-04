<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A JamfProServerUrl record from the Jamf Pro API.
 */
readonly class JamfProServerUrl extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $url = null,
        public array $extra = [],
    ) {}
}
