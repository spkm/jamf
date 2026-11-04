<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Cloud Identity Provider LDAP server configuration for responses
 */
readonly class CloudLdapServerResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?bool $enabled = null,
        public ?string $serverUrl = null,
        public ?string $domainName = null,
        public ?int $port = null,
        /** Response with keystore information */
        public ?CloudLdapKeystore $keystore = null,
        public ?int $connectionTimeout = null,
        public ?int $searchTimeout = null,
        public ?bool $useWildcards = null,
        public ?string $connectionType = null,
        public ?bool $membershipCalculationOptimizationEnabled = null,
        public array $extra = [],
    ) {}
}
