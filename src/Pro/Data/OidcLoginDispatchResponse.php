<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcLoginDispatchResponse record from the Jamf Pro API.
 */
readonly class OidcLoginDispatchResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $redirectUrl = null,
        public array $extra = [],
    ) {}
}
