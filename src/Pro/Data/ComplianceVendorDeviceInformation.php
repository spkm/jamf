<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Additional, compliance vendor specific device details.
 */
readonly class ComplianceVendorDeviceInformation extends Data
{
    /**
     * @param  list<string>|null  $deviceIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Vendor's device IDs. Currently provided only for Intune. */
        public ?array $deviceIds = null,
        public array $extra = [],
    ) {}
}
