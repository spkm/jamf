<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcPublicFeaturesResponse record from the Jamf Pro API.
 */
readonly class OidcPublicFeaturesResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Indicates whether Jamf ID authentication is enabled for this instance. When true, users can authenticate using Jamf ID credentials. When false, Jamf ID login option is not available. */
        public ?bool $jamfIdAuthenticationEnabled = null,
        public array $extra = [],
    ) {}
}
