<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleConfigurationDependency record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleConfigurationDependency extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $smartGroupId = null,
        public ?string $smartGroupName = null,
        public array $extra = [],
    ) {}
}
