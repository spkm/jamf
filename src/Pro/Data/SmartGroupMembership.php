<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * the ids of the computers that are members of the smart group
 */
readonly class SmartGroupMembership extends Data
{
    /**
     * @param  list<int>|null  $members
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $members = null,
        public array $extra = [],
    ) {}
}
