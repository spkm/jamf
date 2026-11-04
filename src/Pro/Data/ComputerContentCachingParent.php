<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingParent record from the Jamf Pro API.
 */
readonly class ComputerContentCachingParent extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $contentCachingParentId = null,
        public ?string $address = null,
        public ?ComputerContentCachingParentAlert $alerts = null,
        public ?ComputerContentCachingParentDetails $details = null,
        public ?string $guid = null,
        public ?bool $healthy = null,
        public ?int $port = null,
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
