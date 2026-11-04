<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EbookExclusions record from the Jamf Pro API.
 */
readonly class EbookExclusions extends Data
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
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $computerIds = null,
        public ?array $computerGroupIds = null,
        public ?array $mobileDeviceIds = null,
        public ?array $mobileDeviceGroupIds = null,
        public ?array $buildingIds = null,
        public ?array $departmentIds = null,
        public ?array $userIds = null,
        public ?array $userGroupIds = null,
        public ?EbookLimitations $limitations = null,
        public array $extra = [],
    ) {}
}
