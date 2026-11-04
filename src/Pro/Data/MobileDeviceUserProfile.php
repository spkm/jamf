<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceUserProfile record from the Jamf Pro API.
 */
readonly class MobileDeviceUserProfile extends Data
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
        public ?string $username = null,
        public array $extra = [],
    ) {}
}
