<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Cloud Identity Provider user group mappings configuration
 */
readonly class GroupMappings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $objectClassLimitation = null,
        public ?string $objectClasses = null,
        public ?string $searchBase = null,
        public ?string $searchScope = null,
        public ?string $groupID = null,
        public ?string $groupName = null,
        public ?string $groupUuid = null,
        public array $extra = [],
    ) {}
}
