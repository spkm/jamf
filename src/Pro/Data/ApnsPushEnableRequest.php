<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * Status information for an enable all clients push request
 */
readonly class ApnsPushEnableRequest extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Timestamp when the request was created (ISO-8601 format) */
        public ?CarbonImmutable $requestedTime = null,
        /** Current status of the request */
        public ?string $status = null,
        /** Timestamp when the request was processed (ISO-8601 format), null if not yet processed */
        public ?CarbonImmutable $processedTime = null,
        public array $extra = [],
    ) {}
}
