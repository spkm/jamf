<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Cloud Identity Provider user group membership mappings configuration
 */
readonly class MembershipMappings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupMembershipMapping = null,
        public array $extra = [],
    ) {}
}
