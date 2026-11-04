<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AuthAccount record from the Jamf Pro API.
 */
readonly class AuthAccount extends Data
{
    /**
     * @param  array<string, mixed>|null  $privilegesBySite
     * @param  list<int>|null  $groupIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $username = null,
        public ?string $realName = null,
        public ?string $email = null,
        public ?AccountPreferences $preferences = null,
        public ?bool $isMultiSiteAdmin = null,
        public ?string $accessLevel = null,
        public ?string $privilegeSet = null,
        public ?array $privilegesBySite = null,
        public ?array $groupIds = null,
        public ?int $currentSiteId = null,
        public array $extra = [],
    ) {}
}
