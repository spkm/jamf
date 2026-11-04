<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SelfServicePlusSettings record from the Jamf Pro API.
 */
readonly class SelfServicePlusSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Whether Self Service Plus is enabled */
        public ?bool $enabled = null,
        public array $extra = [],
    ) {}
}
