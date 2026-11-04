<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A StaticComputerGroupAssignment record from the Jamf Pro API.
 */
readonly class StaticComputerGroupAssignment extends Data
{
    /**
     * @param  list<string>|null  $assignments
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $siteId = null,
        /** Set of computer IDs to assign to the static group */
        public ?array $assignments = null,
        public array $extra = [],
    ) {}
}
