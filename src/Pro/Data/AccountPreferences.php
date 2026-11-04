<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountPreferences record from the Jamf Pro API.
 */
readonly class AccountPreferences extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $language = null,
        public ?string $dateFormat = null,
        public ?string $region = null,
        public ?string $timezone = null,
        public ?bool $isDisableRelativeDates = null,
        public array $extra = [],
    ) {}
}
