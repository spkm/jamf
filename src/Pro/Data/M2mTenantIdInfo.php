<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A M2mTenantIdInfo record from the Jamf Pro API.
 */
readonly class M2mTenantIdInfo extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The M2M-sourced tenant ID */
        public ?string $tenantId = null,
        public array $extra = [],
    ) {}
}
