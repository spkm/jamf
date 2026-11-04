<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PolicyPropertiesV1 record from the Jamf Pro API.
 */
readonly class PolicyPropertiesV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** This field always returns false. */
        public ?bool $policiesRequireNetworkStateChange = null,
        public ?bool $allowNetworkStateChangeTriggers = null,
        public array $extra = [],
    ) {}
}
