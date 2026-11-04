<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * An LDAP group.
 */
readonly class LdapGroup extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $uuid = null,
        public ?int $ldapServerId = null,
        public ?string $name = null,
        public ?string $distinguishedName = null,
        public array $extra = [],
    ) {}
}
