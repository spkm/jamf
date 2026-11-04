<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A JamfProtectPlan record from the Jamf Pro API.
 */
readonly class JamfProtectPlan extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uuid = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $profileId = null,
        public ?string $profileName = null,
        public ?int $profileVersion = null,
        public ?string $scopeDescription = null,
        public ?string $siteId = null,
        public array $extra = [],
    ) {}
}
