<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceMdmCapableUser record from the Jamf Pro API.
 */
readonly class MobileDeviceMdmCapableUser extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $userShortName = null,
        public ?string $managementId = null,
        public array $extra = [],
    ) {}
}
