<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A InventoryListMobileDevice record from the Jamf Pro API.
 */
readonly class InventoryListMobileDevice extends Data
{
    protected const LISTS = ['extensionAttributeValueList' => ExtensionAttributeValue::class];

    protected const HIDDEN = ['airPlayPassword'];

    /**
     * @param  Collection<int, ExtensionAttributeValue>|null  $extensionAttributeValueList
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $mobileDeviceId = null,
        public ?string $udid = null,
        public ?string $airPlayPassword = null,
        public ?bool $appAnalyticsEnabled = null,
        public ?string $assetTag = null,
        public ?int $availableSpaceMb = null,
        public ?int $batteryLevel = null,
        /** - NON_GENUINE: The battery isn't a genuine Apple battery. - NORMAL: The battery is operating normally. - SERVICE_RECOMMENDED: The system recommends battery service. - UNKNOWN: The system couldn't... */
        public ?string $batteryHealth = null,
        public ?bool $bluetoothLowEnergyCapable = null,
        public ?string $bluetoothMacAddress = null,
        public ?int $capacityMb = null,
        public ?CarbonImmutable $lostModeEnabledDate = null,
        public ?bool $declarativeDeviceManagementEnabled = null,
        /** The enrollment type reported by Apple. */
        public ?string $appleEnrollmentType = null,
        /** Whether the device is awaiting configuration. */
        public ?bool $awaitingConfiguration = null,
        /** Whether Return to Service is enabled. */
        public ?bool $returnToServiceEnabled = null,
        /** Whether Lockdown Mode is enabled. */
        public ?bool $lockdownModeEnabled = null,
        public ?string $deviceId = null,
        public ?bool $deviceLocatorServiceEnabled = null,
        public ?string $deviceOwnershipType = null,
        public ?string $devicePhoneNumber = null,
        public ?bool $diagnosticAndUsageReportingEnabled = null,
        public ?string $displayName = null,
        public ?bool $doNotDisturbEnabled = null,
        public ?bool $enrollmentSessionTokenValid = null,
        public ?string $exchangeDeviceId = null,
        public ?bool $cloudBackupEnabled = null,
        public ?string $osBuild = null,
        public ?string $osSupplementalBuildVersion = null,
        public ?string $osRapidSecurityResponse = null,
        public ?string $osVersion = null,
        public ?string $ipAddress = null,
        public ?bool $itunesStoreAccountActive = null,
        public ?int $jamfParentPairings = null,
        public ?string $languages = null,
        public ?CarbonImmutable $lastBackupDate = null,
        public ?CarbonImmutable $lastContactDate = null,
        public ?CarbonImmutable $lastEnrolledDate = null,
        public ?CarbonImmutable $lastCloudBackupDate = null,
        public ?CarbonImmutable $lastInventoryUpdateDate = null,
        public ?string $locales = null,
        public ?bool $locationServicesForSelfServiceMobileEnabled = null,
        public ?bool $lostModeEnabled = null,
        public ?bool $managed = null,
        public ?string $managementId = null,
        public ?CarbonImmutable $mdmProfileExpirationDate = null,
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $modelNumber = null,
        public ?string $modemFirmwareVersion = null,
        public ?int $pairedDevices = null,
        public ?int $quotaSize = null,
        public ?int $residentUsers = null,
        public ?string $serialNumber = null,
        public ?bool $sharedIpad = null,
        public ?bool $supervised = null,
        public ?bool $tethered = null,
        public ?string $timeZone = null,
        public ?int $usedSpacePercentage = null,
        public ?string $wifiMacAddress = null,
        public ?string $building = null,
        public ?string $department = null,
        public ?string $emailAddress = null,
        public ?string $fullName = null,
        public ?string $position = null,
        public ?string $room = null,
        public ?string $userPhoneNumber = null,
        public ?string $username = null,
        public ?string $appleCareId = null,
        public ?CarbonImmutable $leaseExpirationDate = null,
        public ?int $lifeExpectancyYears = null,
        public ?CarbonImmutable $poDate = null,
        public ?string $poNumber = null,
        public ?string $purchasePrice = null,
        public ?bool $purchasedOrLeased = null,
        public ?string $purchasingAccount = null,
        public ?string $purchasingContact = null,
        public ?string $vendor = null,
        public ?CarbonImmutable $warrantyExpirationDate = null,
        public ?bool $activationLockEnabled = null,
        public ?bool $blockEncryptionCapable = null,
        public ?bool $dataProtection = null,
        public ?bool $fileEncryptionCapable = null,
        public ?bool $hardwareEncryptionSupported = null,
        public ?string $jailbreakStatus = null,
        public ?bool $passcodeCompliant = null,
        public ?bool $passcodeCompliantWithProfile = null,
        public ?int $passcodeLockGracePeriodEnforcedSeconds = null,
        public ?bool $passcodePresent = null,
        /** **Deprecated as of 11.25.** This field always returns false. */
        public ?bool $personalDeviceProfileCurrent = null,
        public ?string $carrierSettingsVersion = null,
        public ?string $cellularTechnology = null,
        public ?string $currentCarrierNetwork = null,
        public ?string $currentMobileCountryCode = null,
        public ?string $currentMobileNetworkCode = null,
        public ?bool $dataRoamingEnabled = null,
        public ?string $eid = null,
        public ?string $homeCarrierNetwork = null,
        public ?string $homeMobileCountryCode = null,
        public ?string $homeMobileNetworkCode = null,
        public ?string $iccid = null,
        public ?string $imei = null,
        public ?string $imei2 = null,
        public ?string $meid = null,
        public ?bool $personalHotspotEnabled = null,
        public ?string $preferredVoiceNumber = null,
        public ?bool $roaming = null,
        public ?string $voiceRoamingEnabled = null,
        public ?string $lastLoggedInUsernameSelfService = null,
        public ?CarbonImmutable $lastLoggedInUsernameSelfServiceTimestamp = null,
        public ?string $lastLoggedInUsernameMdm = null,
        public ?CarbonImmutable $lastLoggedInUsernameMdmTimestamp = null,
        public ?Collection $extensionAttributeValueList = null,
        public array $extra = [],
    ) {}
}
