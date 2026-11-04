<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleConfigurationExtensionAttributes record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleConfigurationExtensionAttributes extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Once an extension attribute is accepted, it cannot be reverted. */
        public ?bool $accepted = null,
        public ?string $eaId = null,
        public array $extra = [],
    ) {}
}
