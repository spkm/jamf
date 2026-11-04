<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceUserAndLocation record from the Jamf Pro API.
 */
readonly class MobileDeviceUserAndLocation extends Data
{
    protected const LISTS = ['extensionAttributes' => MobileDeviceExtensionAttribute::class];

    /**
     * @param  Collection<int, MobileDeviceExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $realName = null,
        public ?string $emailAddress = null,
        public ?string $position = null,
        public ?string $phoneNumber = null,
        public ?string $departmentId = null,
        public ?string $buildingId = null,
        public ?string $room = null,
        public ?string $building = null,
        public ?string $department = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
