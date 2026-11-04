<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * will be populated if the type is ios or visionos.
 */
readonly class DetailsV2 extends Data
{
    protected const LISTS = ['serviceSubscriptions' => MobileDeviceServiceSubscriptions::class, 'applications' => MobileDeviceApplication::class, 'certificates' => MobileDeviceCertificateV2::class, 'ebooks' => MobileDeviceEbook::class, 'mdmCapableUsers' => MobileDeviceMdmCapableUser::class, 'configurationProfiles' => ConfigurationProfile::class, 'provisioningProfiles' => MobileDeviceProvisioningProfiles::class, 'attachments' => MobileDeviceAttachmentV2::class];

    /**
     * @param  Collection<int, MobileDeviceServiceSubscriptions>|null  $serviceSubscriptions
     * @param  Collection<int, MobileDeviceApplication>|null  $applications
     * @param  Collection<int, MobileDeviceCertificateV2>|null  $certificates
     * @param  Collection<int, MobileDeviceEbook>|null  $ebooks
     * @param  Collection<int, MobileDeviceMdmCapableUser>|null  $mdmCapableUsers
     * @param  Collection<int, ConfigurationProfile>|null  $configurationProfiles
     * @param  Collection<int, MobileDeviceProvisioningProfiles>|null  $provisioningProfiles
     * @param  Collection<int, MobileDeviceAttachmentV2>|null  $attachments
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $modelNumber = null,
        public ?bool $supervised = null,
        public ?int $batteryLevel = null,
        /** - NON_GENUINE: The battery isnât a genuine Apple battery. - NORMAL: The battery is operating normally. - SERVICE_RECOMMENDED: The system recommends battery service. - UNKNOWN: The system couldnât... */
        public ?string $batteryHealth = null,
        public ?CarbonImmutable $lastBackupTimestamp = null,
        public ?int $capacityMb = null,
        public ?int $availableMb = null,
        public ?int $percentageUsed = null,
        public ?bool $shared = null,
        public ?bool $deviceLocatorServiceEnabled = null,
        public ?bool $doNotDisturbEnabled = null,
        public ?bool $cloudBackupEnabled = null,
        public ?CarbonImmutable $lastCloudBackupTimestamp = null,
        public ?bool $locationServicesEnabled = null,
        public ?bool $iTunesStoreAccountActive = null,
        public ?bool $bleCapable = null,
        public ?string $unlockToken = null,
        /** Whether Return to Service is enabled. */
        public ?bool $returnToServiceEnabled = null,
        /** System health status for device components. Reported for iOS devices. */
        public ?SystemHealthV2 $systemHealth = null,
        public ?IdAndNameV2 $computer = null,
        public ?PurchasingV2 $purchasing = null,
        public ?SecurityV2 $security = null,
        public ?NetworkV2 $network = null,
        public ?Collection $serviceSubscriptions = null,
        public ?Collection $applications = null,
        public ?Collection $certificates = null,
        public ?Collection $ebooks = null,
        public ?Collection $mdmCapableUsers = null,
        public ?Collection $configurationProfiles = null,
        public ?Collection $provisioningProfiles = null,
        public ?Collection $attachments = null,
        public array $extra = [],
    ) {}
}
