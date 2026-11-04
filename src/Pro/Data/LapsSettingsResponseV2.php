<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LapsSettingsResponseV2 record from the Jamf Pro API.
 */
readonly class LapsSettingsResponseV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** When enabled, all appropriate computers will have the SetAutoAdminPassword command sent to them automatically. */
        public ?bool $autoDeployEnabled = null,
        /** The amount of time in seconds that the local admin password will be rotated after viewing. */
        public ?int $passwordRotationTime = null,
        /** When enabled, all appropriate computers will automatically have their password expired and rotated after the configured autoRotateExpirationTime */
        public ?bool $autoRotateEnabled = null,
        /** The amount of time in seconds that the local admin password will be rotated automatically if it is never viewed. */
        public ?int $autoRotateExpirationTime = null,
        public array $extra = [],
    ) {}
}
