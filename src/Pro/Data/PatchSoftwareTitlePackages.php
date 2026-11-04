<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitlePackages record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitlePackages extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $packageId = null,
        public ?string $version = null,
        public ?string $displayName = null,
        public array $extra = [],
    ) {}
}
