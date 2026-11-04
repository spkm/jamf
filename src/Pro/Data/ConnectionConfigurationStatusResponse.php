<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Response that contains connection configuration status for Team Viewer
 */
readonly class ConnectionConfigurationStatusResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** connection configuration status for Team Viewer */
        public ?string $connectionVerificationResult = null,
        public array $extra = [],
    ) {}
}
