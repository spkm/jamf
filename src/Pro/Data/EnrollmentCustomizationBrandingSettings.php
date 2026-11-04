<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentCustomizationBrandingSettings record from the Jamf Pro API.
 */
readonly class EnrollmentCustomizationBrandingSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $textColor = null,
        public ?string $buttonColor = null,
        public ?string $buttonTextColor = null,
        public ?string $backgroundColor = null,
        public ?string $iconUrl = null,
        public array $extra = [],
    ) {}
}
