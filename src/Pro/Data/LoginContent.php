<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LoginContent record from the Jamf Pro API.
 */
readonly class LoginContent extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $rampInstance = null,
        public ?bool $fedRampInstance = null,
        public ?bool $highComplianceInstance = null,
        public ?bool $includeCustomDisclaimer = null,
        public ?string $disclaimerHeading = null,
        public ?string $disclaimerMainText = null,
        public ?string $actionText = null,
        public array $extra = [],
    ) {}
}
