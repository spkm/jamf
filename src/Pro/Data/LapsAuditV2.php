<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A LapsAuditV2 record from the Jamf Pro API.
 */
readonly class LapsAuditV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $viewedBy = null,
        public ?CarbonImmutable $dateSeen = null,
        public array $extra = [],
    ) {}
}
