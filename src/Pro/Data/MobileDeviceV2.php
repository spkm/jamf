<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceV2 record from the Jamf Pro API.
 */
readonly class MobileDeviceV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $serialNumber = null,
        public ?string $wifiMacAddress = null,
        public ?string $udid = null,
        public ?string $phoneNumber = null,
        public ?string $model = null,
        public ?string $modelIdentifier = null,
        public ?string $username = null,
        public ?string $type = null,
        public ?string $managementId = null,
        public ?string $softwareUpdateDeviceId = null,
        public array $extra = [],
    ) {}
}
