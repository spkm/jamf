<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Cloud Identity Provider Azure configuration for responses
 */
readonly class AzureConfiguration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** A Cloud Identity Provider information */
        public ?CloudIdPCommon $cloudIdPCommon = null,
        /** Azure Cloud Identity Provider configuration */
        public ?AzureServerConfiguration $server = null,
        public array $extra = [],
    ) {}
}
