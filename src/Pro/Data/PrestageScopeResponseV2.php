<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A PrestageScopeResponseV2 record from the Jamf Pro API.
 */
readonly class PrestageScopeResponseV2 extends Data
{
    protected const LISTS = ['assignments' => PrestageScopeAssignmentV2::class];

    /**
     * @param  Collection<int, PrestageScopeAssignmentV2>|null  $assignments
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $prestageId = null,
        public ?Collection $assignments = null,
        public ?int $versionLock = null,
        public array $extra = [],
    ) {}
}
