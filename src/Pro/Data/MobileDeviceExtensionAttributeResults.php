<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceExtensionAttributeResults record from the Jamf Pro API.
 */
readonly class MobileDeviceExtensionAttributeResults extends Data
{
    /**
     * @param  array<mixed>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
