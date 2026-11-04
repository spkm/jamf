<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Assignment record from the Jamf Pro API.
 */
readonly class Assignment extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $mobileDeviceId = null,
        /** If true the device should be added to the group, if false should be removed from the group */
        public ?bool $selected = null,
        public array $extra = [],
    ) {}
}
