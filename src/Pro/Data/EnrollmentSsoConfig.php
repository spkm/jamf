<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentSsoConfig record from the Jamf Pro API.
 */
readonly class EnrollmentSsoConfig extends Data
{
    /**
     * @param  list<string>|null  $hosts
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $hosts = null,
        public ?string $managementHint = null,
        public array $extra = [],
    ) {}
}
