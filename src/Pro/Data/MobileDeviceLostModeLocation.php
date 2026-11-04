<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceLostModeLocation record from the Jamf Pro API.
 */
readonly class MobileDeviceLostModeLocation extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?CarbonImmutable $lastLocationUpdate = null,
        public ?float $lostModeLocationHorizontalAccuracyMeters = null,
        public ?float $lostModeLocationVerticalAccuracyMeters = null,
        public ?float $lostModeLocationAltitudeMeters = null,
        public ?float $lostModeLocationSpeedMetersPerSecond = null,
        public ?float $lostModeLocationCourseDegrees = null,
        public ?string $lostModeLocationTimestamp = null,
        public array $extra = [],
    ) {}
}
