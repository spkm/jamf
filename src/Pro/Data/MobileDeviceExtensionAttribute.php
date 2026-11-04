<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceExtensionAttribute record from the Jamf Pro API.
 */
readonly class MobileDeviceExtensionAttribute extends Data
{
    /**
     * @param  list<string>|null  $value
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?array $value = null,
        public ?bool $extensionAttributeCollectionAllowed = null,
        public ?string $inventoryDisplay = null,
        public array $extra = [],
    ) {}
}
