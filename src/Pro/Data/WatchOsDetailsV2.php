<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * will be populated if the type is watchos.
 */
readonly class WatchOsDetailsV2 extends Data
{
    protected const LISTS = ['applications' => MobileDeviceApplication::class, 'certificates' => MobileDeviceCertificateV2::class, 'configurationProfiles' => ConfigurationProfile::class, 'provisioningProfiles' => MobileDeviceProvisioningProfiles::class, 'attachments' => MobileDeviceAttachmentV2::class];

    /**
     * @param  Collection<int, MobileDeviceApplication>|null  $applications
     * @param  Collection<int, MobileDeviceCertificateV2>|null  $certificates
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
        public ?int $capacityMb = null,
        public ?int $availableMb = null,
        public ?int $percentageUsed = null,
        public ?bool $deviceLocatorServiceEnabled = null,
        public ?bool $doNotDisturbEnabled = null,
        public ?CarbonImmutable $lastCloudBackupTimestamp = null,
        public ?bool $iTunesStoreAccountActive = null,
        public ?bool $bleCapable = null,
        public ?string $unlockToken = null,
        public ?SecurityV2 $security = null,
        public ?Collection $applications = null,
        public ?Collection $certificates = null,
        public ?Collection $configurationProfiles = null,
        public ?Collection $provisioningProfiles = null,
        public ?Collection $attachments = null,
        public array $extra = [],
    ) {}
}
