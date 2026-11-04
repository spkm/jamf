<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * Information about a client with push notifications disabled
 */
readonly class ApnsClientPushStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The type of MDM client device */
        public ?string $deviceType = null,
        /** Id of the Computer or Device record in Jamf Pro */
        public ?string $clientId = null,
        /** Timestamp when push notifications were disabled for this client (ISO-8601 format) */
        public ?CarbonImmutable $disabledAt = null,
        /** Unique identifier for the device management record */
        public ?string $managementId = null,
        public array $extra = [],
    ) {}
}
