<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ParentApp record from the Jamf Pro API.
 */
readonly class ParentApp extends Data
{
    protected const LISTS = ['safelistedApps' => SafelistedApp::class];

    /**
     * @param  array<string, mixed>|null  $restrictedTimes
     * @param  Collection<int, SafelistedApp>|null  $safelistedApps
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $timezoneId = null,
        public ?array $restrictedTimes = null,
        public ?int $deviceGroupId = null,
        public ?bool $isEnabled = null,
        public ?bool $allowTemplates = null,
        public ?bool $disassociateOnWipeAndReEnroll = null,
        public ?bool $allowClearPasscode = null,
        public ?Collection $safelistedApps = null,
        public array $extra = [],
    ) {}
}
