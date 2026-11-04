<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ExtensionAttributeValue record from the Jamf Pro API.
 */
readonly class ExtensionAttributeValue extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $value = null,
        public array $extra = [],
    ) {}
}
