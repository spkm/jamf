<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ActiveUserSession record from the Jamf Pro API.
 */
readonly class ActiveUserSession extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Username of the logged in user */
        public ?string $username = null,
        /** Unique session identifier */
        public ?string $sessionId = null,
        /** Timestamp of when the session was last accessed */
        public ?CarbonImmutable $lastAccessedTime = null,
        /** Timestamp of when the session was created */
        public ?CarbonImmutable $creationTime = null,
        /** User agent string from the session */
        public ?string $userAgent = null,
        /** IP address associated with the session */
        public ?string $ipAddress = null,
        public array $extra = [],
    ) {}
}
