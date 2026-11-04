<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A InventoryPreloadExtensionAttributeColumn record from the Jamf Pro API.
 */
readonly class InventoryPreloadExtensionAttributeColumn extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $fullName = null,
        public array $extra = [],
    ) {}
}
