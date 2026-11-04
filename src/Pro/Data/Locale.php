<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Locale record from the Jamf Pro API.
 */
readonly class Locale extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $description = null,
        public ?string $identifier = null,
        public array $extra = [],
    ) {}
}
