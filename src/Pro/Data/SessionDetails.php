<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * Session details
 */
readonly class SessionDetails extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Session identifier */
        public ?string $id = null,
        /** Sessions code */
        public ?string $code = null,
        /** Session description. To be used for additional context on the reason of the session */
        public ?string $description = null,
        /** Supporter session URL */
        public ?string $supporterLink = null,
        /** End user session URL */
        public ?string $endUserLink = null,
        /** Device identifier */
        public ?string $deviceId = null,
        /** Device name if found - null otherwise */
        public ?string $deviceName = null,
        /** Device type */
        public ?string $deviceType = null,
        /** Session state */
        public ?string $state = null,
        /** ID of session creator if session created by Jamf Pro local user, null otherwise */
        public ?string $creatorId = null,
        /** Username of the session creator */
        public ?string $creatorName = null,
        /** Session creation time */
        public ?CarbonImmutable $createdAt = null,
        public array $extra = [],
    ) {}
}
