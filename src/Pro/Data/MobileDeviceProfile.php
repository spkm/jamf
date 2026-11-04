<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceProfile record from the Jamf Pro API.
 */
readonly class MobileDeviceProfile extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $version = null,
        public ?string $uuid = null,
        public ?string $identifier = null,
        public ?bool $removable = null,
        public ?CarbonImmutable $lastInstalled = null,
        public array $extra = [],
    ) {}
}
