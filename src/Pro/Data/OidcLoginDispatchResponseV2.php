<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcLoginDispatchResponseV2 record from the Jamf Pro API.
 */
readonly class OidcLoginDispatchResponseV2 extends Data
{
    /**
     * @param  array<mixed>|null  $idpRedirects
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $idpRedirects = null,
        public array $extra = [],
    ) {}
}
