<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceAttachmentV2 record from the Jamf Pro API.
 */
readonly class MobileDeviceAttachmentV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $id = null,
        public array $extra = [],
    ) {}
}
