<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A RenewMdmProfileResponse record from the Jamf Pro API.
 */
readonly class RenewMdmProfileResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Udids $udidsNotProcessed = null,
        public array $extra = [],
    ) {}
}
