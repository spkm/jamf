<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceServiceSubscriptions record from the Jamf Pro API.
 */
readonly class MobileDeviceServiceSubscriptions extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $carrierSettingsVersion = null,
        public ?string $currentCarrierNetwork = null,
        public ?string $currentMobileCountryCode = null,
        public ?string $currentMobileNetworkCode = null,
        public ?string $subscriberCarrierNetwork = null,
        public ?string $eid = null,
        public ?string $iccid = null,
        public ?string $imei = null,
        public ?bool $dataPreferred = null,
        public ?bool $roaming = null,
        public ?bool $voicePreferred = null,
        public ?string $label = null,
        /** The unique identifier for this subscription. */
        public ?string $labelId = null,
        public ?string $meid = null,
        public ?string $phoneNumber = null,
        /** The description of the slot that contains the SIM representing this subscription. */
        public ?string $slot = null,
        public array $extra = [],
    ) {}
}
