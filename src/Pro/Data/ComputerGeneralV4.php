<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerGeneralV4 record from the Jamf Pro API.
 */
readonly class ComputerGeneralV4 extends Data
{
    protected const LISTS = ['extensionAttributes' => ComputerExtensionAttribute::class];

    /**
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $lastIpAddress = null,
        /** Last reported IPv4 address */
        public ?string $lastReportedIpV4 = null,
        public ?string $lastReportedIpV6 = null,
        public ?string $jamfBinaryVersion = null,
        public ?string $platform = null,
        public ?string $barcode1 = null,
        public ?string $barcode2 = null,
        public ?string $assetTag = null,
        public ?ComputerRemoteManagement $remoteManagement = null,
        public ?bool $supervised = null,
        public ?ComputerMdmCapability $mdmCapable = null,
        public ?CarbonImmutable $reportDate = null,
        public ?CarbonImmutable $lastCheckIn = null,
        public ?CarbonImmutable $lastContact = null,
        public ?CarbonImmutable $lastCloudBackupDate = null,
        public ?CarbonImmutable $lastEnrolledDate = null,
        public ?CarbonImmutable $mdmProfileExpiration = null,
        public ?string $initialEntryDate = null,
        public ?string $distributionPoint = null,
        public ?EnrollmentMethod $enrollmentMethod = null,
        public ?ComputerSite $site = null,
        public ?bool $itunesStoreAccountActive = null,
        public ?bool $enrolledViaAutomatedDeviceEnrollment = null,
        public ?bool $userApprovedMdm = null,
        public ?bool $declarativeDeviceManagementEnabled = null,
        /** The enrollment type reported by Apple. */
        public ?string $appleEnrollmentType = null,
        /** Whether the device is awaiting configuration. */
        public ?bool $awaitingConfiguration = null,
        public ?Collection $extensionAttributes = null,
        public ?string $managementId = null,
        public ?string $lastLoggedInUsernameSelfService = null,
        public ?CarbonImmutable $lastLoggedInUsernameSelfServiceTimestamp = null,
        public ?string $lastLoggedInUsernameBinary = null,
        public ?CarbonImmutable $lastLoggedInUsernameBinaryTimestamp = null,
        public ?string $lastLoggedInUsernameMdm = null,
        public ?CarbonImmutable $lastLoggedInUsernameMdmTimestamp = null,
        public array $extra = [],
    ) {}
}
