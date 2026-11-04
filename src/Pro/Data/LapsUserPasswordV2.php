<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LapsUserPasswordV2 record from the Jamf Pro API.
 */
readonly class LapsUserPasswordV2 extends Data
{
    protected const HIDDEN = ['password'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $password = null,
        public array $extra = [],
    ) {}
}
