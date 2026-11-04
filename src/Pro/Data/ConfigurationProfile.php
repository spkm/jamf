<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ConfigurationProfile record from the Jamf Pro API.
 */
readonly class ConfigurationProfile extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $version = null,
        public ?string $uuid = null,
        public ?string $identifier = null,
        public array $extra = [],
    ) {}
}
