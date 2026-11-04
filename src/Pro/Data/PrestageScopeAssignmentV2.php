<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PrestageScopeAssignmentV2 record from the Jamf Pro API.
 */
readonly class PrestageScopeAssignmentV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $serialNumber = null,
        public ?CarbonImmutable $assignmentDate = null,
        public ?string $userAssigned = null,
        public array $extra = [],
    ) {}
}
