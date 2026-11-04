<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OAuthClientCredentials record from the Jamf Pro API.
 */
readonly class OAuthClientCredentials extends Data
{
    protected const HIDDEN = ['clientSecret'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $clientId = null,
        public ?string $clientSecret = null,
        public array $extra = [],
    ) {}
}
