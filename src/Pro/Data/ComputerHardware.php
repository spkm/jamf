<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerHardware record from the Jamf Pro API.
 */
readonly class ComputerHardware extends Data
{
    protected const LISTS = ['extensionAttributes' => ComputerExtensionAttribute::class];

    /**
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $make = null,
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $serialNumber = null,
        /** Processor Speed in MHz. */
        public ?int $processorSpeedMhz = null,
        public ?int $processorCount = null,
        public ?int $coreCount = null,
        public ?string $processorType = null,
        public ?string $processorArchitecture = null,
        public ?int $busSpeedMhz = null,
        /** Cache Size in KB. */
        public ?int $cacheSizeKilobytes = null,
        public ?string $networkAdapterType = null,
        public ?string $macAddress = null,
        public ?string $altNetworkAdapterType = null,
        public ?string $altMacAddress = null,
        /** Total RAM Size in MB. */
        public ?int $totalRamMegabytes = null,
        /** Available RAM slots. */
        public ?int $openRamSlots = null,
        /** Remaining percentage of battery power. */
        public ?int $batteryCapacityPercent = null,
        /** - NON_GENUINE: The battery isnât a genuine Apple battery. - NORMAL: The battery is operating normally. - SERVICE_RECOMMENDED: The system recommends battery service. - UNKNOWN: The system couldnât... */
        public ?string $batteryHealth = null,
        public ?string $smcVersion = null,
        public ?string $nicSpeed = null,
        public ?string $opticalDrive = null,
        public ?string $bootRom = null,
        public ?bool $bleCapable = null,
        public ?bool $supportsIosAppInstalls = null,
        public ?bool $appleSilicon = null,
        public ?string $provisioningUdid = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
