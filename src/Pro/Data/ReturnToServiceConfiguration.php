<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ReturnToServiceConfiguration record from the Jamf Pro API.
 */
readonly class ReturnToServiceConfiguration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Id of the Return to Service Configuration. */
        public ?string $id = null,
        public ?string $displayName = null,
        /** Id of the wifi profile that is associated with the return to service configuration. */
        public ?string $wifiProfileId = null,
        public array $extra = [],
    ) {}
}
