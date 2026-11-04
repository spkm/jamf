<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AdvancedSearchCriteriaChoices record from the Jamf Pro API.
 */
readonly class AdvancedSearchCriteriaChoices extends Data
{
    /**
     * @param  list<string>|null  $choices
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $choices = null,
        public array $extra = [],
    ) {}
}
