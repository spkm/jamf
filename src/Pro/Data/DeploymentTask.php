<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A DeploymentTask record from the Jamf Pro API.
 */
readonly class DeploymentTask extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $computerId = null,
        public ?string $computerName = null,
        public ?string $version = null,
        public ?CarbonImmutable $updated = null,
        /** Status of this Jamf Connect deployment task. "Command" below refers to an `InstallEnterpriseApplication` command. Tasks that are not finished (i.e., `COMPLETE` or `GAVE_UP`) are evaluated once every... */
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
