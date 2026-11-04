<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LocationV2 record from the Jamf Pro API.
 */
readonly class LocationV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $realName = null,
        public ?string $emailAddress = null,
        public ?string $position = null,
        public ?string $phoneNumber = null,
        public ?string $departmentId = null,
        public ?string $buildingId = null,
        public ?string $room = null,
        public array $extra = [],
    ) {}
}
