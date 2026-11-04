<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceGroup record from the Jamf Pro API.
 */
readonly class MobileDeviceGroup extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $isSmartGroup = null,
        public array $extra = [],
    ) {}
}
