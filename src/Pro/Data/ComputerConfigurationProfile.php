<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ComputerConfigurationProfile record from the Jamf Pro API.
 */
readonly class ComputerConfigurationProfile extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $username = null,
        public ?CarbonImmutable $lastInstalled = null,
        public ?bool $removable = null,
        public ?string $displayName = null,
        public ?string $profileIdentifier = null,
        public ?string $uuid = null,
        public array $extra = [],
    ) {}
}
