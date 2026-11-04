<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceHardware record from the Jamf Pro API.
 */
readonly class MobileDeviceHardware extends Data
{
    protected const LISTS = ['extensionAttributes' => MobileDeviceExtensionAttribute::class];

    /**
     * @param  Collection<int, MobileDeviceExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $capacityMb = null,
        public ?int $availableSpaceMb = null,
        public ?int $usedSpacePercentage = null,
        public ?int $batteryLevel = null,
        /** - NON_GENUINE: The battery isnât a genuine Apple battery. - NORMAL: The battery is operating normally. - SERVICE_RECOMMENDED: The system recommends battery service. - UNKNOWN: The system couldnât... */
        public ?string $batteryHealth = null,
        public ?string $serialNumber = null,
        public ?string $wifiMacAddress = null,
        public ?string $bluetoothMacAddress = null,
        public ?string $modemFirmwareVersion = null,
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $modelNumber = null,
        public ?bool $bluetoothLowEnergyCapable = null,
        public ?string $deviceId = null,
        /** System health status for device components. Reported for iOS devices. */
        public ?MobileDeviceSystemHealth $systemHealth = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
