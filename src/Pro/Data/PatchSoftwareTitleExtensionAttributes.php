<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleExtensionAttributes record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleExtensionAttributes extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $eaId = null,
        public ?bool $accepted = null,
        public ?string $displayName = null,
        public ?string $scriptContents = null,
        public array $extra = [],
    ) {}
}
