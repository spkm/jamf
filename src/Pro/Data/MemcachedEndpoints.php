<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MemcachedEndpoints record from the Jamf Pro API.
 */
readonly class MemcachedEndpoints extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $hostName = null,
        public ?int $port = null,
        public ?bool $enabled = null,
        public ?int $jssCacheConfigurationId = null,
        public array $extra = [],
    ) {}
}
