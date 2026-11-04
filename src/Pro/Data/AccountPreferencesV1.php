<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountPreferencesV1 record from the Jamf Pro API.
 */
readonly class AccountPreferencesV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $language = null,
        public ?string $dateFormat = null,
        public ?string $region = null,
        public ?string $timezone = null,
        public ?bool $disableRelativeDates = null,
        public array $extra = [],
    ) {}
}
