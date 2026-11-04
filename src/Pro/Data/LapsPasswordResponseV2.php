<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LapsPasswordResponseV2 record from the Jamf Pro API.
 */
readonly class LapsPasswordResponseV2 extends Data
{
    protected const HIDDEN = ['password'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $password = null,
        public array $extra = [],
    ) {}
}
