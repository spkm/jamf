<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceGroup record from the Jamf Pro API.
 */
readonly class DeviceGroup extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Group Platform ID */
        public ?string $id = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
