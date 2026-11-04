<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryCollectionSettingsV2 record from the Jamf Pro API.
 */
readonly class ComputerInventoryCollectionSettingsV2 extends Data
{
    protected const LISTS = ['applicationPaths' => AppPath::class];

    /**
     * @param  Collection<int, AppPath>|null  $applicationPaths
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?ComputerInventoryCollectionPreferencesV2 $computerInventoryCollectionPreferences = null,
        public ?Collection $applicationPaths = null,
        public array $extra = [],
    ) {}
}
