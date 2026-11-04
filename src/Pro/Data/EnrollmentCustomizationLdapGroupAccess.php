<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentCustomizationLdapGroupAccess record from the Jamf Pro API.
 */
readonly class EnrollmentCustomizationLdapGroupAccess extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $ldapServerId = null,
        public ?string $groupName = null,
        public array $extra = [],
    ) {}
}
