<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmtpGoogleMailAuthentication record from the Jamf Pro API.
 */
readonly class SmtpGoogleMailAuthentication extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $emailAddress = null,
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
