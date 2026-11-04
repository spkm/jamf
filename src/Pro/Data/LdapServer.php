<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * An LDAP Server.
 */
readonly class LdapServer extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
