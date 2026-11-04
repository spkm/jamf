<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmartGroup record from the Jamf Pro API.
 */
readonly class SmartGroup extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        public ?string $siteId = null,
        /** membership count */
        public ?int $count = null,
        public array $extra = [],
    ) {}
}
