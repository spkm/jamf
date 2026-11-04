<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A UnmanageMobileDeviceResponse record from the Jamf Pro API.
 */
readonly class UnmanageMobileDeviceResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Id of the mobile device whose MDM profile was removed */
        public ?string $deviceId = null,
        /** Uuid of the command queued that removes the MDM profile */
        public ?string $commandUuid = null,
        public array $extra = [],
    ) {}
}
