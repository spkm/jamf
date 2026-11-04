<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SsoKeystoreResponseWithDetails record from the Jamf Pro API.
 */
readonly class SsoKeystoreResponseWithDetails extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?SsoKeystoreResponse $keystore = null,
        public ?SsoKeystoreDetails $keystoreDetails = null,
        public array $extra = [],
    ) {}
}
