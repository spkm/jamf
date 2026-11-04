<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleReport record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleReport extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $computerName = null,
        public ?string $deviceId = null,
        public ?string $username = null,
        public ?string $operatingSystemVersion = null,
        public ?CarbonImmutable $lastContactTime = null,
        public ?string $buildingName = null,
        public ?string $departmentName = null,
        public ?string $siteName = null,
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
