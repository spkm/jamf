<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CloudDistributionPointUploadCapability record from the Jamf Pro API.
 */
readonly class CloudDistributionPointUploadCapability extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $principalDistributionTechnology = null,
        public ?bool $directUploadCapable = null,
        public array $extra = [],
    ) {}
}
