<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A VerbosePackageDeploymentResponse record from the Jamf Pro API.
 */
readonly class VerbosePackageDeploymentResponse extends Data
{
    /**
     * @param  array<mixed>|null  $queuedCommands
     * @param  array<mixed>|null  $errors
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $queuedCommands = null,
        public ?array $errors = null,
        public array $extra = [],
    ) {}
}
