<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceEnrollmentDevice record from the Jamf Pro API.
 */
readonly class DeviceEnrollmentDevice extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $deviceEnrollmentProgramInstanceId = null,
        public ?string $prestageId = null,
        public ?string $serialNumber = null,
        public ?string $description = null,
        public ?string $model = null,
        public ?string $color = null,
        public ?string $assetTag = null,
        public ?string $profileStatus = null,
        public ?AssignRemoveProfileResponseSyncState $syncState = null,
        public ?string $profileAssignTime = null,
        public ?string $profilePushTime = null,
        public ?string $deviceAssignedDate = null,
        public array $extra = [],
    ) {}
}
