<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A NetworkV2 record from the Jamf Pro API.
 */
readonly class NetworkV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $cellularTechnology = null,
        public ?bool $voiceRoamingEnabled = null,
        public ?string $imei = null,
        public ?string $iccid = null,
        public ?string $meid = null,
        /** EID or "embedded identity document" is a number associated with the eSIM on a device */
        public ?string $eid = null,
        public ?string $carrierSettingsVersion = null,
        public ?string $currentCarrierNetwork = null,
        public ?string $currentMobileCountryCode = null,
        public ?string $currentMobileNetworkCode = null,
        public ?string $homeCarrierNetwork = null,
        public ?string $homeMobileCountryCode = null,
        public ?string $homeMobileNetworkCode = null,
        public ?bool $dataRoamingEnabled = null,
        public ?bool $roaming = null,
        public ?bool $personalHotspotEnabled = null,
        public ?string $phoneNumber = null,
        public ?string $preferredVoiceNumber = null,
        public array $extra = [],
    ) {}
}
