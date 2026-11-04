<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Cloud Identity Provider information for responses
 */
readonly class CloudIdPCommonResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $displayName = null,
        public ?bool $enabled = null,
        public ?string $providerName = null,
        public ?string $providerDescription = null,
        public array $extra = [],
    ) {}
}
