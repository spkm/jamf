<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceProvisioningProfiles record from the Jamf Pro API.
 */
readonly class MobileDeviceProvisioningProfiles extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $uuid = null,
        public ?CarbonImmutable $expirationDate = null,
        public array $extra = [],
    ) {}
}
