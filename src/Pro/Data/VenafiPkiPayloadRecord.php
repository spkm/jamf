<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A VenafiPkiPayloadRecord record from the Jamf Pro API.
 */
readonly class VenafiPkiPayloadRecord extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $urlPath = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
