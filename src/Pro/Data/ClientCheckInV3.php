<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ClientCheckInV3 record from the Jamf Pro API.
 */
readonly class ClientCheckInV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Suggested values are 5, 15, 30, or 60. Web interface will not display correctly if not one of those. Minimum is 5, maximum is 60. */
        public ?int $checkInFrequency = null,
        public ?bool $createHooks = null,
        public ?bool $hookLog = null,
        public ?bool $hookPolicies = null,
        public ?bool $createStartupScript = null,
        public ?bool $startupLog = null,
        public ?bool $startupPolicies = null,
        public ?bool $startupSsh = null,
        public ?bool $enableLocalConfigurationProfiles = null,
        public array $extra = [],
    ) {}
}
