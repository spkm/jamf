<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A IosBrandingConfiguration record from the Jamf Pro API.
 */
readonly class IosBrandingConfiguration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $brandingName = null,
        public ?int $iconId = null,
        public ?string $headerBackgroundColorCode = null,
        public ?string $menuIconColorCode = null,
        public ?string $brandingNameColorCode = null,
        public ?string $statusBarTextColor = null,
        public array $extra = [],
    ) {}
}
