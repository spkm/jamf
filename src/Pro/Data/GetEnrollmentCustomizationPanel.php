<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GetEnrollmentCustomizationPanel record from the Jamf Pro API.
 */
readonly class GetEnrollmentCustomizationPanel extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?int $rank = null,
        public ?int $id = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
