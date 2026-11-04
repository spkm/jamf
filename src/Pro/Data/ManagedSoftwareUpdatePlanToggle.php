<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlanToggle record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlanToggle extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $toggle = null,
        public ?bool $forceInstallLocalDateEnabled = null,
        public ?bool $customVersionEnabled = null,
        public ?bool $dssEnabled = null,
        public ?bool $recipeEnabled = null,
        public array $extra = [],
    ) {}
}
