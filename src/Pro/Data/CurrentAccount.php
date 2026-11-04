<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CurrentAccount record from the Jamf Pro API.
 */
readonly class CurrentAccount extends Data
{
    /**
     * @param  list<string>|null  $privileges
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
        public ?array $privileges = null,
        public ?array $groupIds = null,
        public ?int $currentSiteId = null,
        public array $extra = [],
    ) {}
}
