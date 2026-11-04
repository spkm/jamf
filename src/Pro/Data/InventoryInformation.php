<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Jamf Pro Inventory statistics object. Aggregates managed/unmanaged devices and computers counters
 */
readonly class InventoryInformation extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Number of managed computers in inventory. */
        public ?int $managedComputers = null,
        /** Number of unmanaged computers in inventory. */
        public ?int $unmanagedComputers = null,
        /** Number of managed devices in inventory. */
        public ?int $managedDevices = null,
        /** Number of unmanaged devices in inventory. */
        public ?int $unmanagedDevices = null,
        public array $extra = [],
    ) {}
}
