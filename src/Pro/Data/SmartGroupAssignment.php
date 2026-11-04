<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SmartGroupAssignment record from the Jamf Pro API.
 */
readonly class SmartGroupAssignment extends Data
{
    protected const LISTS = ['criteria' => SmartGroupCriteria::class];

    /**
     * @param  Collection<int, SmartGroupCriteria>|null  $criteria
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The unique identifier of the smart group */
        public ?string $groupId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        public ?string $siteId = null,
        public ?Collection $criteria = null,
        public array $extra = [],
    ) {}
}
