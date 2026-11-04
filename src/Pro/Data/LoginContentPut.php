<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LoginContentPut record from the Jamf Pro API.
 */
readonly class LoginContentPut extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $includeCustomDisclaimer = null,
        public ?string $disclaimerHeading = null,
        public ?string $disclaimerMainText = null,
        public ?string $actionText = null,
        public array $extra = [],
    ) {}
}
