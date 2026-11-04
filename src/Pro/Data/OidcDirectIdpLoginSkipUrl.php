<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcDirectIdpLoginSkipUrl record from the Jamf Pro API.
 */
readonly class OidcDirectIdpLoginSkipUrl extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Direct IdP login URL to skip unified login page. */
        public ?string $url = null,
        public array $extra = [],
    ) {}
}
