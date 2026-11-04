<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SlasaAcceptance record from the Jamf Pro API.
 */
readonly class SlasaAcceptance extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $slasaAcceptanceStatus = null,
        public array $extra = [],
    ) {}
}
