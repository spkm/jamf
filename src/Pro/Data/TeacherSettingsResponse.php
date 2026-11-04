<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A TeacherSettingsResponse record from the Jamf Pro API.
 */
readonly class TeacherSettingsResponse extends Data
{
    protected const LISTS = ['safelistedApps' => SafelistedApp::class];

    /**
     * @param  Collection<int, SafelistedApp>|null  $safelistedApps
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $isEnabled = null,
        public ?string $timezoneId = null,
        public ?string $autoClear = null,
        public ?int $maxRestrictionLengthSeconds = null,
        public ?string $displayNameType = null,
        public ?TeacherFeatures $features = null,
        public ?Collection $safelistedApps = null,
        public array $extra = [],
    ) {}
}
