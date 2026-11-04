<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentCustomizationV2 record from the Jamf Pro API.
 */
readonly class EnrollmentCustomizationV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $siteId = null,
        public ?string $displayName = null,
        public ?string $description = null,
        public ?EnrollmentCustomizationBrandingSettings $enrollmentCustomizationBrandingSettings = null,
        public array $extra = [],
    ) {}
}
