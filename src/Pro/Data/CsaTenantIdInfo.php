<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CsaTenantIdInfo record from the Jamf Pro API.
 */
readonly class CsaTenantIdInfo extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The tenant ID */
        public ?string $tenantId = null,
        public array $extra = [],
    ) {}
}
