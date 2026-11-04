<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A LapsAccountManagementHistory record from the Jamf Pro API.
 */
readonly class LapsAccountManagementHistory extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $eventType = null,
        public ?CarbonImmutable $eventTime = null,
        public ?string $viewedBy = null,
        public ?string $userSource = null,
        public array $extra = [],
    ) {}
}
