<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryCollectionSettings record from the Jamf Pro API.
 */
readonly class ComputerInventoryCollectionSettings extends Data
{
    protected const LISTS = ['applicationPaths' => AppPath::class, 'fontPaths' => FontPath::class, 'pluginPaths' => PluginPath::class];

    /**
     * @param  Collection<int, AppPath>|null  $applicationPaths
     * @param  Collection<int, FontPath>|null  $fontPaths
     * @param  Collection<int, PluginPath>|null  $pluginPaths
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?ComputerInventoryCollectionPreferences $computerInventoryCollectionPreferences = null,
        public ?Collection $applicationPaths = null,
        public ?Collection $fontPaths = null,
        public ?Collection $pluginPaths = null,
        public array $extra = [],
    ) {}
}
