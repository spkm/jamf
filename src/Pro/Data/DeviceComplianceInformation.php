<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Device compliance information record
 */
readonly class DeviceComplianceInformation extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** ID of the device */
        public ?string $deviceId = null,
        /** If device is applicable for compliance calculation */
        public ?bool $applicable = null,
        /** Device compliance state. Possible values are: * `UNKNOWN` for unknow compliance state, this usually means that the compliance state is being calculated, * `NON_COMPLIANT` for non compliant state, *... */
        public ?string $complianceState = null,
        /** Name of the compliance vendor */
        public ?string $complianceVendor = null,
        /** Additional, compliance vendor specific device details. */
        public ?ComplianceVendorDeviceInformation $complianceVendorDeviceInformation = null,
        public array $extra = [],
    ) {}
}
