<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A RedeployJamfManagementFrameworkResponse record from the Jamf Pro API.
 */
readonly class RedeployJamfManagementFrameworkResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $deviceId = null,
        public ?string $commandUuid = null,
        public array $extra = [],
    ) {}
}
