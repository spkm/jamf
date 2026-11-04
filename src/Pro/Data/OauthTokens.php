<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OauthTokens record from the Jamf Pro API.
 */
readonly class OauthTokens extends Data
{
    protected const HIDDEN = ['accessToken'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $accessToken = null,
        public ?string $idToken = null,
        public array $extra = [],
    ) {}
}
