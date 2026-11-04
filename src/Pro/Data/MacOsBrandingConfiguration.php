<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MacOsBrandingConfiguration record from the Jamf Pro API.
 */
readonly class MacOsBrandingConfiguration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $applicationName = null,
        public ?string $brandingName = null,
        public ?string $brandingNameSecondary = null,
        public ?int $iconId = null,
        public ?int $brandingHeaderImageId = null,
        public ?string $homeHeading = null,
        public ?string $homeSubheading = null,
        public array $extra = [],
    ) {}
}
