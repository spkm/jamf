<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceDetailsV2 record from the Jamf Pro API.
 */
readonly class MobileDeviceDetailsV2 extends Data
{
    protected const LISTS = ['extensionAttributes' => ExtensionAttributeV2::class];

    /**
     * @param  Collection<int, ExtensionAttributeV2>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        /** Mobile device name. */
        public ?string $name = null,
        /** Enforce the mobile device name. Device must be supervised. If set to true, Jamf Pro will revert the Mobile Device Name to the ânameâ value each time the device checks in. */
        public ?bool $enforceName = null,
        public ?string $assetTag = null,
        public ?CarbonImmutable $lastInventoryUpdateTimestamp = null,
        public ?CarbonImmutable $lastContactTimestamp = null,
        public ?string $osVersion = null,
        public ?string $osBuild = null,
        /** Collected for iOS 16 and iPadOS 16.1 or later */
        public ?string $osSupplementalBuildVersion = null,
        /** Collected for iOS 16 and iPadOS 16.1 or later */
        public ?string $osRapidSecurityResponse = null,
        public ?string $softwareUpdateDeviceId = null,
        public ?string $serialNumber = null,
        public ?string $udid = null,
        public ?string $ipAddress = null,
        public ?string $wifiMacAddress = null,
        public ?string $bluetoothMacAddress = null,
        public ?bool $managed = null,
        public ?string $timeZone = null,
        public ?CarbonImmutable $initialEntryTimestamp = null,
        public ?CarbonImmutable $lastEnrollmentTimestamp = null,
        public ?CarbonImmutable $mdmProfileExpirationTimestamp = null,
        public ?string $deviceOwnershipLevel = null,
        public ?string $enrollmentMethod = null,
        public ?bool $enrollmentSessionTokenValid = null,
        public ?bool $declarativeDeviceManagementEnabled = null,
        /** The enrollment type reported by Apple. */
        public ?string $appleEnrollmentType = null,
        /** Whether the device is awaiting configuration. */
        public ?bool $awaitingConfiguration = null,
        public ?V1SiteBase $site = null,
        public ?Collection $extensionAttributes = null,
        public ?LocationV2 $location = null,
        /** Based on the value of this either iOS, tvOS, watch or visionOS objects will be populated. */
        public ?string $type = null,
        /** will be populated if the type is ios or visionos. */
        public ?DetailsV2 $ios = null,
        /** will be populated if the type is appleTv. */
        public ?TvOsDetails $tvos = null,
        /** will be populated if the type is watchos. */
        public ?WatchOsDetailsV2 $watchos = null,
        /** will be populated if the type is ios or visionos. */
        public ?DetailsV2 $visionos = null,
        public array $extra = [],
    ) {}
}
