<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Status of tested Cloud Ldap connection
 */
readonly class CloudLdapConnectionStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
