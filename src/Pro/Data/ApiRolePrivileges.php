<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ApiRolePrivileges record from the Jamf Pro API.
 */
readonly class ApiRolePrivileges extends Data
{
    /**
     * @param  list<string>|null  $privileges
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $privileges = null,
        public array $extra = [],
    ) {}
}
