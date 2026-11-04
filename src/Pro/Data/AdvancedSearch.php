<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A AdvancedSearch record from the Jamf Pro API.
 */
readonly class AdvancedSearch extends Data
{
    protected const LISTS = ['criteria' => SmartSearchCriterion::class];

    /**
     * @param  Collection<int, SmartSearchCriterion>|null  $criteria
     * @param  list<string>|null  $displayFields
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?Collection $criteria = null,
        public ?array $displayFields = null,
        public ?string $siteId = null,
        public array $extra = [],
    ) {}
}
