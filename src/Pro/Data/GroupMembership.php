<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GroupMembership record from the Jamf Pro API.
 */
readonly class GroupMembership extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        /** Indicates that group is smart group */
        public ?bool $smartGroup = null,
        public array $extra = [],
    ) {}
}
