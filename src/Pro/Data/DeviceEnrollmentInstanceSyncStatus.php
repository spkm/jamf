<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceEnrollmentInstanceSyncStatus record from the Jamf Pro API.
 */
readonly class DeviceEnrollmentInstanceSyncStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $syncState = null,
        public ?string $instanceId = null,
        public ?string $timestamp = null,
        public array $extra = [],
    ) {}
}
