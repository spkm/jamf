<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A UserTestAttributes record from the Jamf Pro API.
 */
readonly class UserTestAttributes extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $fullName = null,
        public ?string $emailAddress = null,
        public ?string $phoneNumber = null,
        public ?string $position = null,
        public ?string $room = null,
        public ?string $buildingName = null,
        public ?string $departmentName = null,
        public array $extra = [],
    ) {}
}
