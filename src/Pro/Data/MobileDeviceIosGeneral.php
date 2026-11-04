<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceIosGeneral record from the Jamf Pro API.
 */
readonly class MobileDeviceIosGeneral extends Data
{
    protected const LISTS = ['extensionAttributes' => MobileDeviceExtensionAttribute::class];

    /**
     * @param  Collection<int, MobileDeviceExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $udid = null,
        public ?string $displayName = null,
        public ?string $assetTag = null,
        public ?string $siteId = null,
        public ?CarbonImmutable $lastInventoryUpdateDate = null,
        /** The date and time of the most recent device contact via MDM or DDM channels. */
        public ?CarbonImmutable $lastContactDate = null,
        public ?string $osVersion = null,
        public ?string $osRapidSecurityResponse = null,
        public ?string $osBuild = null,
        public ?string $osSupplementalBuildVersion = null,
        public ?string $softwareUpdateDeviceId = null,
        public ?string $ipAddress = null,
        public ?bool $managed = null,
        public ?bool $supervised = null,
        /** The enrollment method used for the device. **Note:** The `PersonalDeviceProfile` enrollment method was removed as of 11.25. */
        public ?string $deviceOwnershipType = null,
        /** The enrollment type reported by Apple. */
        public ?string $appleEnrollmentType = null,
        /** Whether the device is awaiting configuration. */
        public ?bool $awaitingConfiguration = null,
        public ?EnrollmentMethodPrestage $enrollmentMethodPrestage = null,
        public ?bool $enrollmentSessionTokenValid = null,
        public ?CarbonImmutable $lastEnrolledDate = null,
        public ?CarbonImmutable $mdmProfileExpirationDate = null,
        /** IANA time zone database name */
        public ?string $timeZone = null,
        public ?bool $declarativeDeviceManagementEnabled = null,
        public ?string $managementId = null,
        public ?Collection $extensionAttributes = null,
        public ?string $lastLoggedInUsernameSelfService = null,
        public ?CarbonImmutable $lastLoggedInUsernameSelfServiceTimestamp = null,
        public ?string $lastLoggedInUsernameMdm = null,
        public ?CarbonImmutable $lastLoggedInUsernameMdmTimestamp = null,
        public ?bool $sharedIpad = null,
        public ?bool $diagnosticAndUsageReportingEnabled = null,
        public ?bool $appAnalyticsEnabled = null,
        public ?int $residentUsers = null,
        public ?int $quotaSize = null,
        public ?bool $temporarySessionOnly = null,
        public ?int $temporarySessionTimeout = null,
        public ?int $userSessionTimeout = null,
        public ?int $syncedToComputer = null,
        public ?int $maximumSharediPadUsersStored = null,
        public ?CarbonImmutable $lastBackupDate = null,
        public ?bool $deviceLocatorServiceEnabled = null,
        public ?bool $doNotDisturbEnabled = null,
        public ?bool $cloudBackupEnabled = null,
        public ?CarbonImmutable $lastCloudBackupDate = null,
        public ?bool $locationServicesForSelfServiceMobileEnabled = null,
        public ?bool $itunesStoreAccountActive = null,
        public ?string $exchangeDeviceId = null,
        public ?bool $tethered = null,
        /** Whether Return to Service is enabled. */
        public ?bool $returnToServiceEnabled = null,
        public array $extra = [],
    ) {}
}
