<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PolicyProperties record from the Jamf Pro API.
 */
readonly class PolicyProperties extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** This field always returns false. */
        public ?bool $isPoliciesRequireNetworkStateChange = null,
        public ?bool $isAllowNetworkStateChangeTriggers = null,
        public array $extra = [],
    ) {}
}
