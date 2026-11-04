<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CsaToken record from the Jamf Pro API.
 */
readonly class CsaToken extends Data
{
    /**
     * @param  list<string>|null  $scopes
     * @param  list<string>|null  $legacyJamfSalesforceIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The tenant ID */
        public ?string $tenantId = null,
        /** Salesforce CRM account ID */
        public ?string $subject = null,
        public ?int $refreshExpiration = null,
        public ?array $scopes = null,
        public ?array $legacyJamfSalesforceIds = null,
        public array $extra = [],
    ) {}
}
