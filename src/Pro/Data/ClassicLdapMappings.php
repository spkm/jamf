<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Classic Ldap mappings configuration
 */
readonly class ClassicLdapMappings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $userObjectMapIdTo = null,
        public ?string $userObjectMapUsernameTo = null,
        public ?string $userObjectMapRealNameTo = null,
        public ?string $userObjectMapEmailTo = null,
        public ?string $userObjectMapDepartmentTo = null,
        public ?string $userObjectMapBuildingTo = null,
        public ?string $userObjectMapRoomTo = null,
        public ?string $userObjectMapPhoneTo = null,
        public ?string $userObjectMapPositionTo = null,
        public ?string $userObjectMapUuidTo = null,
        public ?string $userGroupObjectMapIdTo = null,
        public ?string $userGroupObjectMapGroupNameTo = null,
        public ?string $userGroupObjectMapUuidTo = null,
        public array $extra = [],
    ) {}
}
