<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AuthToken record from the Jamf Pro API.
 */
readonly class AuthToken extends Data
{
    protected const HIDDEN = ['token'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $token = null,
        public ?int $expires = null,
        public array $extra = [],
    ) {}
}
