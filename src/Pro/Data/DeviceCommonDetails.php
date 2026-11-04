<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A DeviceCommonDetails record from the Jamf Pro API.
 */
readonly class DeviceCommonDetails extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Unique identifier for the device common details record */
        public ?string $id = null,
        /** The client management ID associated with this device */
        public ?string $clientManagementId = null,
        /** Timestamp when MDM profile renewal started (ISO 8601 format) */
        public ?CarbonImmutable $renewMdmProfileStartDate = null,
        /** Whether the MDM profile needs renewal due to CA renewal */
        public ?bool $mdmProfileNeedsRenewalDueToCaRenewed = null,
        /** Whether the MDM profile needs renewal due to expiring device identity certificate */
        public ?bool $mdmProfileNeedsRenewalDueToDeviceIdentityCertExpiring = null,
        /** URL for MDM check-in */
        public ?string $mdmCheckinUrl = null,
        /** URL for MDM server */
        public ?string $mdmServerUrl = null,
        public array $extra = [],
    ) {}
}
