<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Mappings configuration response for Ldap Cloud Identity Provider configuration
 */
readonly class CloudLdapMappingsResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Cloud Identity Provider user mappings configuration */
        public ?UserMappings $userMappings = null,
        /** Cloud Identity Provider user group mappings configuration */
        public ?GroupMappings $groupMappings = null,
        /** Cloud Identity Provider user group membership mappings configuration */
        public ?MembershipMappings $membershipMappings = null,
        public array $extra = [],
    ) {}
}
