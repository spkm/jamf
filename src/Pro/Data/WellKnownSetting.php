<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A WellKnownSetting record from the Jamf Pro API.
 */
readonly class WellKnownSetting extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Organization display name */
        public ?string $orgName = null,
        /** Server UUID identifier */
        public ?string $serverUuid = null,
        /** Service discovery enrollment version */
        public ?string $enrollmentType = null,
        public array $extra = [],
    ) {}
}
