<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Azure Cloud Identity Provider configuration
 */
readonly class AzureServerConfiguration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $tenantId = null,
        public ?bool $enabled = null,
        public ?bool $deprecatedConsent = null,
        public ?bool $migrated = null,
        /** Azure Cloud Identity Provider mappings */
        public ?AzureMappings $mappings = null,
        public ?int $searchTimeout = null,
        /** Use this field to enable transitive membership lookup with Single Sign On */
        public ?bool $transitiveMembershipEnabled = null,
        /** Use this field to set user field mapping for transitive membership lookup with Single Sign On */
        public ?string $transitiveMembershipUserField = null,
        /** Use this field to enable transitive membership lookup. This setting would not apply to Single Sign On */
        public ?bool $transitiveDirectoryMembershipEnabled = null,
        /** Use this field to enable membership calculation optimization. This setting would not apply to Single Sign On */
        public ?bool $membershipCalculationOptimizationEnabled = null,
        /** Type of Entra ID connection */
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
