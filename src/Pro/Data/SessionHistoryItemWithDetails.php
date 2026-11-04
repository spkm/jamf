<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A SessionHistoryItemWithDetails record from the Jamf Pro API.
 */
readonly class SessionHistoryItemWithDetails extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $tenantId = null,
        public ?string $sessionId = null,
        public ?string $deviceId = null,
        public ?CarbonImmutable $sessionStartedTimestamp = null,
        public ?CarbonImmutable $sessionEndedTimestamp = null,
        public ?string $sessionType = null,
        public ?string $statusType = null,
        public ?string $sessionAdminId = null,
        public ?string $comment = null,
        public ?SessionHistoryItemDetails $details = null,
        public array $extra = [],
    ) {}
}
