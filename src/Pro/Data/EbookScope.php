<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EbookScope record from the Jamf Pro API.
 */
readonly class EbookScope extends Data
{
    /**
     * @param  list<string>|null  $computerIds
     * @param  list<string>|null  $computerGroupIds
     * @param  list<string>|null  $mobileDeviceIds
     * @param  list<string>|null  $mobileDeviceGroupIds
     * @param  list<string>|null  $buildingIds
     * @param  list<string>|null  $departmentIds
     * @param  list<string>|null  $userIds
     * @param  list<string>|null  $userGroupIds
     * @param  list<string>|null  $classroomIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $allComputers = null,
        public ?bool $allMobileDevices = null,
        public ?bool $allUsers = null,
        public ?array $computerIds = null,
        public ?array $computerGroupIds = null,
        public ?array $mobileDeviceIds = null,
        public ?array $mobileDeviceGroupIds = null,
        public ?array $buildingIds = null,
        public ?array $departmentIds = null,
        public ?array $userIds = null,
        public ?array $userGroupIds = null,
        public ?array $classroomIds = null,
        public ?EbookLimitations $limitations = null,
        public ?EbookExclusions $exclusions = null,
        public array $extra = [],
    ) {}
}
