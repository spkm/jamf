<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Cloud Identity Provider LDAP configuration for responses
 */
readonly class LdapConfigurationResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** A Cloud Identity Provider information */
        public ?CloudIdPCommon $cloudIdPCommon = null,
        /** A Cloud Identity Provider LDAP server configuration for responses */
        public ?CloudLdapServerResponse $server = null,
        /** Mappings configuration response for Ldap Cloud Identity Provider configuration */
        public ?CloudLdapMappingsResponse $mappings = null,
        public array $extra = [],
    ) {}
}
