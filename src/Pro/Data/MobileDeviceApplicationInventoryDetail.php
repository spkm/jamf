<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceApplicationInventoryDetail record from the Jamf Pro API.
 */
readonly class MobileDeviceApplicationInventoryDetail extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $identifier = null,
        public ?string $name = null,
        public ?string $version = null,
        public ?string $shortVersion = null,
        public ?string $managementStatus = null,
        public ?bool $validationStatus = null,
        public ?string $bundleSize = null,
        public ?string $dynamicSize = null,
        public ?bool $appClip = null,
        public array $extra = [],
    ) {}
}
