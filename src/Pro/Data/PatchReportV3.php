<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PatchReportV3 record from the Jamf Pro API.
 */
readonly class PatchReportV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $computerName = null,
        public ?string $deviceId = null,
        public ?string $username = null,
        public ?string $operatingSystemVersion = null,
        public ?CarbonImmutable $lastCheckIn = null,
        public ?string $buildingName = null,
        public ?string $departmentName = null,
        public ?string $siteName = null,
        public ?string $version = null,
        public array $extra = [],
    ) {}
}
