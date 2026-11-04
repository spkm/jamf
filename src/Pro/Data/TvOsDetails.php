<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * will be populated if the type is appleTv.
 */
readonly class TvOsDetails extends Data
{
    protected const LISTS = ['configurationProfiles' => ConfigurationProfile::class, 'certificates' => MobileDeviceCertificateV2::class, 'applications' => MobileDeviceApplication::class];

    protected const HIDDEN = ['airplayPassword'];

    /**
     * @param  Collection<int, ConfigurationProfile>|null  $configurationProfiles
     * @param  Collection<int, MobileDeviceCertificateV2>|null  $certificates
     * @param  Collection<int, MobileDeviceApplication>|null  $applications
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $modelNumber = null,
        public ?bool $supervised = null,
        public ?string $airplayPassword = null,
        public ?string $deviceId = null,
        public ?string $locales = null,
        public ?PurchasingV2 $purchasing = null,
        public ?Collection $configurationProfiles = null,
        public ?Collection $certificates = null,
        public ?Collection $applications = null,
        public array $extra = [],
    ) {}
}
