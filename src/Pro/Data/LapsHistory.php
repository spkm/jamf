<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A LapsHistory record from the Jamf Pro API.
 */
readonly class LapsHistory extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?CarbonImmutable $createdDate = null,
        public ?CarbonImmutable $dateLastSeen = null,
        public ?CarbonImmutable $expirationTime = null,
        public ?string $rotationStatus = null,
        public array $extra = [],
    ) {}
}
