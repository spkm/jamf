<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmartSearchCriterion record from the Jamf Pro API.
 */
readonly class SmartSearchCriterion extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?int $priority = null,
        public ?string $andOr = null,
        public ?string $searchType = null,
        public ?string $value = null,
        public ?bool $openingParen = null,
        public ?bool $closingParen = null,
        public array $extra = [],
    ) {}
}
