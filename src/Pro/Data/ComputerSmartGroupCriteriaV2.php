<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerSmartGroupCriteriaV2 record from the Jamf Pro API.
 */
readonly class ComputerSmartGroupCriteriaV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The field to search on (e.g., Operating System Version, Computer Name, etc.) */
        public ?string $name = null,
        /** The priority order of this criterion (must start at 0 and increment by 1 per new criteria) */
        public ?int $priority = null,
        /** Whether this criterion should be ANDed or ORed with the previous criterion. Must be exactly "AND" or "OR" (case-insensitive input accepted, stored as lowercase). */
        public ?string $andOr = null,
        /** The type of search to perform (e.g., is, is not, like, greater than or equal, etc.) */
        public ?string $searchType = null,
        /** The value to search for */
        public ?string $value = null,
        /** Whether to add an opening parenthesis before this criterion */
        public ?bool $openingParen = null,
        /** Whether to add a closing parenthesis after this criterion */
        public ?bool $closingParen = null,
        public array $extra = [],
    ) {}
}
