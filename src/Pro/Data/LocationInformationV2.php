<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LocationInformationV2 record from the Jamf Pro API.
 */
readonly class LocationInformationV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $realname = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $room = null,
        public ?string $position = null,
        public ?string $departmentId = null,
        public ?string $buildingId = null,
        public ?string $id = null,
        public ?int $versionLock = null,
        public array $extra = [],
    ) {}
}
