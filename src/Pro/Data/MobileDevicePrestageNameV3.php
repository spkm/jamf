<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDevicePrestageNameV3 record from the Jamf Pro API.
 */
readonly class MobileDevicePrestageNameV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $deviceName = null,
        public ?bool $used = null,
        public array $extra = [],
    ) {}
}
