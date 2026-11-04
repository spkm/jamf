<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceCommunicationSettings record from the Jamf Pro API.
 */
readonly class DeviceCommunicationSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $autoRenewMobileDeviceMdmProfileWhenCaRenewed = null,
        public ?bool $autoRenewMobileDeviceMdmProfileWhenDeviceIdentityCertExpiring = null,
        public ?bool $autoRenewComputerMdmProfileWhenCaRenewed = null,
        public ?bool $autoRenewComputerMdmProfileWhenDeviceIdentityCertExpiring = null,
        public ?int $mdmProfileMobileDeviceExpirationLimitInDays = null,
        public ?int $mdmProfileComputerExpirationLimitInDays = null,
        public array $extra = [],
    ) {}
}
