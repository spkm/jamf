<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MdmRenewalStrategy record from the Jamf Pro API.
 */
readonly class MdmRenewalStrategy extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Unique identifier for the renewal strategy */
        public ?string $id = null,
        /** The MDM renewal error ID this strategy is associated with */
        public ?string $mdmRenewalErrorId = null,
        /** Type of MDM renewal strategy */
        public ?string $mdmRenewalStrategyType = null,
        /** Timestamp when this renewal strategy was created (ISO 8601 format) */
        public ?CarbonImmutable $strategyTimeStamp = null,
        /** URL for MDM renewal check-in */
        public ?string $mdmRenewalCheckInUrl = null,
        /** URL for MDM renewal server */
        public ?string $mdmRenewalServerUrl = null,
        public array $extra = [],
    ) {}
}
