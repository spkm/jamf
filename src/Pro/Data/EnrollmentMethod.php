<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentMethod record from the Jamf Pro API.
 */
readonly class EnrollmentMethod extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $objectName = null,
        public ?string $objectType = null,
        public array $extra = [],
    ) {}
}
