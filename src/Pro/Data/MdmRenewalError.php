<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MdmRenewalError record from the Jamf Pro API.
 */
readonly class MdmRenewalError extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Unique identifier for the MDM renewal error */
        public ?string $mdmRenewalErrorId = null,
        /** The client management ID associated with this error */
        public ?string $clientManagementId = null,
        /** Type of MDM renewal error */
        public ?string $mdmRenewalErrorType = null,
        /** Timestamp when the error occurred (ISO 8601 format) */
        public ?CarbonImmutable $errorTimeStamp = null,
        /** Number of times this error has occurred */
        public ?int $failureCount = null,
        public array $extra = [],
    ) {}
}
