<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A WellKnownSettingsResponse record from the Jamf Pro API.
 */
readonly class WellKnownSettingsResponse extends Data
{
    protected const LISTS = ['wellKnownSettings' => WellKnownSetting::class];

    /**
     * @param  Collection<int, WellKnownSetting>|null  $wellKnownSettings
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Array of well-known settings for all AxM organizations */
        public ?Collection $wellKnownSettings = null,
        public array $extra = [],
    ) {}
}
