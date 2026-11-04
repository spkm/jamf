<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDevicePrestageNamesV3 record from the Jamf Pro API.
 */
readonly class MobileDevicePrestageNamesV3 extends Data
{
    protected const LISTS = ['prestageDeviceNames' => MobileDevicePrestageNameV3::class];

    /**
     * @param  Collection<int, MobileDevicePrestageNameV3>|null  $prestageDeviceNames
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $assignNamesUsing = null,
        public ?Collection $prestageDeviceNames = null,
        public ?string $deviceNamePrefix = null,
        public ?string $deviceNameSuffix = null,
        public ?string $singleDeviceName = null,
        public ?bool $manageNames = null,
        public ?bool $deviceNamingConfigured = null,
        public array $extra = [],
    ) {}
}
