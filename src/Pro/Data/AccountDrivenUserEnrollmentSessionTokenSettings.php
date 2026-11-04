<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Settings for Account Driven User Enrollment. Only 1 of expirationIntervalDays or expirationIntervalSeconds can be
 * supplied.
 */
readonly class AccountDrivenUserEnrollmentSessionTokenSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $enabled = null,
        public ?int $expirationIntervalDays = null,
        public ?int $expirationIntervalSeconds = null,
        public array $extra = [],
    ) {}
}
