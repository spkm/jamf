<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceResponse record from the Jamf Pro API.
 */
readonly class MobileDeviceResponse extends Data
{
    protected const LISTS = ['applications' => MobileDeviceApplicationInventoryDetail::class, 'certificates' => MobileDeviceCertificate::class, 'profiles' => MobileDeviceProfile::class, 'groups' => MobileDeviceInventoryGroup::class, 'extensionAttributes' => MobileDeviceExtensionAttribute::class, 'ebooks' => MobileDeviceEbookInventoryDetail::class, 'serviceSubscriptions' => MobileDeviceServiceSubscriptions::class, 'provisioningProfiles' => MobileDeviceProvisioningProfiles::class, 'sharedUsers' => MobileDeviceSharedUser::class, 'userProfiles' => MobileDeviceUserProfile::class];

    /**
     * @param  Collection<int, MobileDeviceApplicationInventoryDetail>|null  $applications
     * @param  Collection<int, MobileDeviceCertificate>|null  $certificates
     * @param  Collection<int, MobileDeviceProfile>|null  $profiles
     * @param  Collection<int, MobileDeviceInventoryGroup>|null  $groups
     * @param  Collection<int, MobileDeviceExtensionAttribute>|null  $extensionAttributes
     * @param  Collection<int, MobileDeviceEbookInventoryDetail>|null  $ebooks
     * @param  Collection<int, MobileDeviceServiceSubscriptions>|null  $serviceSubscriptions
     * @param  Collection<int, MobileDeviceProvisioningProfiles>|null  $provisioningProfiles
     * @param  Collection<int, MobileDeviceSharedUser>|null  $sharedUsers
     * @param  Collection<int, MobileDeviceUserProfile>|null  $userProfiles
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $mobileDeviceId = null,
        /** Based on the value of this type either ios, appleTv, watch or visionOS objects will be populated. */
        public ?string $deviceType = null,
        public ?MobileDeviceHardware $hardware = null,
        public ?MobileDeviceUserAndLocation $userAndLocation = null,
        public ?Collection $applications = null,
        public ?Collection $certificates = null,
        public ?Collection $profiles = null,
        public ?Collection $groups = null,
        public ?Collection $extensionAttributes = null,
        public ?MobileDeviceIosGeneral $general = null,
        /** This section only available for Ios type. */
        public ?MobileDeviceSecurity $security = null,
        public ?Collection $ebooks = null,
        /** This section only avaiable for Ios type. */
        public ?MobileDeviceNetwork $network = null,
        public ?Collection $serviceSubscriptions = null,
        public ?Collection $provisioningProfiles = null,
        public ?Collection $sharedUsers = null,
        public ?MobileDevicePurchasing $purchasing = null,
        public ?Collection $userProfiles = null,
        public array $extra = [],
    ) {}
}
