<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Cloud Identity Provider user mappings configuration
 */
readonly class UserMappings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $objectClassLimitation = null,
        public ?string $objectClasses = null,
        public ?string $searchBase = null,
        public ?string $searchScope = null,
        public ?string $additionalSearchBase = null,
        public ?string $userID = null,
        public ?string $username = null,
        public ?string $realName = null,
        public ?string $emailAddress = null,
        public ?string $department = null,
        public ?string $building = null,
        public ?string $room = null,
        public ?string $phone = null,
        public ?string $position = null,
        public ?string $userUuid = null,
        public array $extra = [],
    ) {}
}
