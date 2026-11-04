<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerRemoteManagement record from the Jamf Pro API.
 */
readonly class ComputerRemoteManagement extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $managed = null,
        /** This field always returns null, please use /local-admin-password/ endpoint instead. */
        public ?string $managementUsername = null,
        public array $extra = [],
    ) {}
}
