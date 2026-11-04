<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A V1Site record from the Jamf Pro API.
 */
readonly class V1Site extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        /** Platform division identifier (UUID) for this site. */
        public ?string $divisionId = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
