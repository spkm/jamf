<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GetEnrollmentCustomizationPanelSsoAuth record from the Jamf Pro API.
 */
readonly class GetEnrollmentCustomizationPanelSsoAuth extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?int $rank = null,
        public ?bool $isUseJamfConnect = null,
        public ?string $longNameAttribute = null,
        public ?string $shortNameAttribute = null,
        public ?bool $isGroupEnrollmentAccessEnabled = null,
        public ?string $groupEnrollmentAccessName = null,
        public ?int $id = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
