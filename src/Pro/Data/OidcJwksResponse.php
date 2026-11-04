<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OidcJwksResponse record from the Jamf Pro API.
 */
readonly class OidcJwksResponse extends Data
{
    /**
     * @param  array<mixed>|null  $keys
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $keys = null,
        public array $extra = [],
    ) {}
}
