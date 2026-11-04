<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GetEnrollmentCustomizationPanelText record from the Jamf Pro API.
 */
readonly class GetEnrollmentCustomizationPanelText extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?int $rank = null,
        public ?string $body = null,
        public ?string $subtext = null,
        public ?string $title = null,
        public ?string $backButtonText = null,
        public ?string $continueButtonText = null,
        public ?int $id = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
