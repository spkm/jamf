<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A LapsPendingRotation record from the Jamf Pro API.
 */
readonly class LapsPendingRotation extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?LapsUserV2 $lapsUser = null,
        public ?CarbonImmutable $createdDate = null,
        public array $extra = [],
    ) {}
}
