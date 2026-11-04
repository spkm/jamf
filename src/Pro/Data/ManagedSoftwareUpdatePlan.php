<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlan record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlan extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $planUuid = null,
        public ?PlanDevice $device = null,
        public ?string $updateAction = null,
        public ?string $versionType = null,
        /** Optional. Indicates the specific version to update to. Only available when the version type is set to specific version or custom version, otherwise defaults to NO_SPECIFIC_VERSION. */
        public ?string $specificVersion = null,
        /** Optional. Indicates the build version to update to. Only available when the version type is set to custom version. */
        public ?string $buildVersion = null,
        /** Not applicable to all managed software update plans */
        public ?int $maxDeferrals = null,
        /** Optional. Indicates the local date and time of the device to force update by. */
        public ?string $forceInstallLocalDateTime = null,
        /** The id of the recipe that was used to generate the plan. */
        public ?string $recipeId = null,
        public ?PlanStatus $status = null,
        public array $extra = [],
    ) {}
}
