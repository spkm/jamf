<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcSettings record from the Jamf Pro API.
 */
readonly class OidcSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $userMapping = null,
        public ?bool $jamfIdAuthenticationEnabled = null,
        public ?string $usernameAttributeClaimMapping = null,
        public array $extra = [],
    ) {}
}
