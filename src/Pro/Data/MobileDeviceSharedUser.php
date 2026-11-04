<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceSharedUser record from the Jamf Pro API.
 */
readonly class MobileDeviceSharedUser extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $managedAppleId = null,
        public ?bool $loggedIn = null,
        public ?bool $dataToSync = null,
        public array $extra = [],
    ) {}
}
