<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A SmartComputerGroupV3 record from the Jamf Pro API.
 */
readonly class SmartComputerGroupV3 extends Data
{
    protected const LISTS = ['criteria' => ComputerSmartGroupCriteriaV2::class];

    /**
     * @param  Collection<int, ComputerSmartGroupCriteriaV2>|null  $criteria
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?Collection $criteria = null,
        public ?string $siteId = null,
        public array $extra = [],
    ) {}
}
