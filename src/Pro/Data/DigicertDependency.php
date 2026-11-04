<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DigicertDependency record from the Jamf Pro API.
 */
readonly class DigicertDependency extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $configProfileId = null,
        public ?string $configProfileName = null,
        public ?string $configProfileType = null,
        public array $extra = [],
    ) {}
}
