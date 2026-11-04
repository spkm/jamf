<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LapsUserV2 record from the Jamf Pro API.
 */
readonly class LapsUserV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $clientManagementId = null,
        public ?string $guid = null,
        public ?string $username = null,
        public ?string $userSource = null,
        public array $extra = [],
    ) {}
}
