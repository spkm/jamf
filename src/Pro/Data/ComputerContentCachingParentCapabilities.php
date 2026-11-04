<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingParentCapabilities record from the Jamf Pro API.
 */
readonly class ComputerContentCachingParentCapabilities extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $contentCachingParentCapabilitiesId = null,
        public ?bool $imports = null,
        public ?bool $namespaces = null,
        public ?bool $personalContent = null,
        public ?bool $queryParameters = null,
        public ?bool $sharedContent = null,
        public ?bool $prioritization = null,
        public array $extra = [],
    ) {}
}
