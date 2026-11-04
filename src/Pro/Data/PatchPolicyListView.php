<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyListView record from the Jamf Pro API.
 */
readonly class PatchPolicyListView extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $policyName = null,
        public ?bool $policyEnabled = null,
        public ?string $policyTargetVersion = null,
        public ?string $policyDeploymentMethod = null,
        public ?string $softwareTitle = null,
        public ?string $softwareTitleConfigurationId = null,
        public ?int $pending = null,
        public ?int $completed = null,
        public ?int $deferred = null,
        public ?int $failed = null,
        public array $extra = [],
    ) {}
}
