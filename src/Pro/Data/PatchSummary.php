<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PatchSummary record from the Jamf Pro API.
 */
readonly class PatchSummary extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $softwareTitleId = null,
        public ?string $title = null,
        public ?string $latestVersion = null,
        public ?CarbonImmutable $releaseDate = null,
        public ?int $upToDate = null,
        public ?int $outOfDate = null,
        public ?bool $onDashboard = null,
        public ?string $softwareTitleConfigurationId = null,
        public array $extra = [],
    ) {}
}
