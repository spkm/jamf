<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceEnrollmentDisownResponse record from the Jamf Pro API.
 */
readonly class DeviceEnrollmentDisownResponse extends Data
{
    /**
     * @param  array<string, mixed>|null  $devices
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $devices = null,
        public array $extra = [],
    ) {}
}
