<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceSmartGroupCriteriaV2 record from the Jamf Pro API.
 */
readonly class MobileDeviceSmartGroupCriteriaV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The field to search on (e.g., Model, OS Version, etc.) */
        public ?string $name = null,
        /** The priority order of this criterion (must start at 0 and increment by 1) */
        public ?int $priority = null,
        /** Whether this criterion should be ANDed or ORed with the previous criterion. Must be exactly "and" or "or" (case-insensitive). */
        public ?string $andOr = null,
        /** The type of search to perform (e.g., is, is not, like, etc.) */
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
