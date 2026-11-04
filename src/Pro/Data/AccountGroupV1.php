<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountGroupV1 record from the Jamf Pro API.
 */
readonly class AccountGroupV1 extends Data
{
    /**
     * @param  array<mixed>|null  $members
     * @param  list<string>|null  $privileges
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        /** Access level for the account group */
        public ?string $accessLevel = null,
        /** Privilege level for the account group */
        public ?string $privilegeLevel = null,
        public ?string $siteId = null,
        public ?string $ldapServerId = null,
        public ?string $directoryGroupId = null,
        /** Members of this account group */
        public ?array $members = null,
        /** List of privilege strings assigned to this group */
        public ?array $privileges = null,
        public array $extra = [],
    ) {}
}
