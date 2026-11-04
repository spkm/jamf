<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A LastLoginResponse record from the Jamf Pro API.
 */
readonly class LastLoginResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Timestamp of the last login (ISO 8601 format) */
        public ?CarbonImmutable $lastLogin = null,
        public array $extra = [],
    ) {}
}
