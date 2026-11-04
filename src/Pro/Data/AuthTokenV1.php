<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AuthTokenV1 record from the Jamf Pro API.
 */
readonly class AuthTokenV1 extends Data
{
    protected const HIDDEN = ['token'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $token = null,
        public ?string $expires = null,
        public array $extra = [],
    ) {}
}
