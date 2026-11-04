<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyDetail record from the Jamf Pro API.
 */
readonly class PatchPolicyDetail extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?bool $enabled = null,
        public ?string $targetPatchVersion = null,
        public ?string $deploymentMethod = null,
        public ?string $softwareTitleId = null,
        public ?string $softwareTitleConfigurationId = null,
        public ?int $killAppsDelayMinutes = null,
        public ?string $killAppsMessage = null,
        public ?bool $downgrade = null,
        public ?bool $patchUnknownVersion = null,
        public ?string $notificationHeader = null,
        public ?bool $selfServiceEnforceDeadline = null,
        public ?int $selfServiceDeadline = null,
        public ?string $installButtonText = null,
        public ?string $selfServiceDescription = null,
        public ?string $iconId = null,
        public ?int $reminderFrequency = null,
        public ?bool $reminderEnabled = null,
        public array $extra = [],
    ) {}
}
