<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryV4 record from the Jamf Pro API.
 */
readonly class ComputerInventoryV4 extends Data
{
    protected const LISTS = ['applications' => ComputerApplicationV3::class, 'configurationProfiles' => ComputerConfigurationProfile::class, 'printers' => ComputerPrinter::class, 'services' => ComputerService::class, 'localUserAccounts' => ComputerLocalUserAccount::class, 'certificates' => ComputerCertificate::class, 'attachments' => ComputerAttachment::class, 'licensedSoftware' => ComputerLicensedSoftware::class, 'ibeacons' => ComputerIbeacon::class, 'softwareUpdates' => ComputerSoftwareUpdate::class, 'extensionAttributes' => ComputerExtensionAttribute::class, 'groupMemberships' => GroupMembership::class];

    /**
     * @param  Collection<int, ComputerApplicationV3>|null  $applications
     * @param  Collection<int, ComputerConfigurationProfile>|null  $configurationProfiles
     * @param  Collection<int, ComputerPrinter>|null  $printers
     * @param  Collection<int, ComputerService>|null  $services
     * @param  Collection<int, ComputerLocalUserAccount>|null  $localUserAccounts
     * @param  Collection<int, ComputerCertificate>|null  $certificates
     * @param  Collection<int, ComputerAttachment>|null  $attachments
     * @param  Collection<int, ComputerLicensedSoftware>|null  $licensedSoftware
     * @param  Collection<int, ComputerIbeacon>|null  $ibeacons
     * @param  Collection<int, ComputerSoftwareUpdate>|null  $softwareUpdates
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  Collection<int, GroupMembership>|null  $groupMemberships
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $udid = null,
        public ?ComputerGeneralV4 $general = null,
        public ?ComputerDiskEncryption $diskEncryption = null,
        public ?ComputerPurchase $purchasing = null,
        public ?Collection $applications = null,
        public ?ComputerStorage $storage = null,
        public ?ComputerUserAndLocation $userAndLocation = null,
        public ?Collection $configurationProfiles = null,
        public ?Collection $printers = null,
        public ?Collection $services = null,
        public ?ComputerHardware $hardware = null,
        public ?Collection $localUserAccounts = null,
        public ?Collection $certificates = null,
        public ?Collection $attachments = null,
        /** All package receipts are listed by their package name */
        public ?ComputerPackageReceipts $packageReceipts = null,
        public ?ComputerSecurity $security = null,
        public ?ComputerOperatingSystem $operatingSystem = null,
        public ?Collection $licensedSoftware = null,
        public ?Collection $ibeacons = null,
        public ?Collection $softwareUpdates = null,
        public ?Collection $extensionAttributes = null,
        public ?ComputerContentCaching $contentCaching = null,
        public ?Collection $groupMemberships = null,
        public array $extra = [],
    ) {}
}
