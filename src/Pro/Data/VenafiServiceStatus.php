<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A VenafiServiceStatus record from the Jamf Pro API.
 */
readonly class VenafiServiceStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
