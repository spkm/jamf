<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AssignRemoveProfileResponseSyncState record from the Jamf Pro API.
 */
readonly class AssignRemoveProfileResponseSyncState extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $serialNumber = null,
        public ?string $profileUUID = null,
        public ?string $syncStatus = null,
        public ?int $failureCount = null,
        public ?int $timestamp = null,
        public array $extra = [],
    ) {}
}
