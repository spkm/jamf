<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceEbook record from the Jamf Pro API.
 */
readonly class MobileDeviceEbook extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $author = null,
        public ?string $title = null,
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
