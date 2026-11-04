<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A JamfProVersion record from the Jamf Pro API.
 */
readonly class JamfProVersion extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
