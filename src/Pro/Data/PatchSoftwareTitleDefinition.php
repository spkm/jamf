<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleDefinition record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleDefinition extends Data
{
    protected const LISTS = ['killApps' => PatchSoftwareTitleConfigurationDefinitionKillApp::class];

    /**
     * @param  Collection<int, PatchSoftwareTitleConfigurationDefinitionKillApp>|null  $killApps
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $version = null,
        public ?string $minimumOperatingSystem = null,
        public ?string $releaseDate = null,
        public ?bool $rebootRequired = null,
        public ?Collection $killApps = null,
        public ?bool $standalone = null,
        public ?string $absoluteOrderId = null,
        public array $extra = [],
    ) {}
}
