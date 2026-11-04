<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerUserManagementInfo record from the Jamf Pro API.
 */
readonly class ComputerUserManagementInfo extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $capableUser = null,
        public ?string $managementId = null,
        public array $extra = [],
    ) {}
}
