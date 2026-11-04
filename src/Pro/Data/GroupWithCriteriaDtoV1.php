<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A GroupWithCriteriaDtoV1 record from the Jamf Pro API.
 */
readonly class GroupWithCriteriaDtoV1 extends Data
{
    protected const LISTS = ['criteria' => SmartGroupCriteria::class];

    /**
     * @param  Collection<int, SmartGroupCriteria>|null  $criteria
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupPlatformId = null,
        public ?string $groupJamfProId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        public ?string $groupType = null,
        public ?bool $smart = null,
        public ?int $membershipCount = null,
        public ?Collection $criteria = null,
        public array $extra = [],
    ) {}
}
