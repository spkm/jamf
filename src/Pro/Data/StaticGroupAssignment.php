<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A StaticGroupAssignment record from the Jamf Pro API.
 */
readonly class StaticGroupAssignment extends Data
{
    protected const LISTS = ['assignments' => Assignment::class];

    /**
     * @param  Collection<int, Assignment>|null  $assignments
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        public ?string $siteId = null,
        public ?Collection $assignments = null,
        public array $extra = [],
    ) {}
}
