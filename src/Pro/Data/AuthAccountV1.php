<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AuthAccountV1 record from the Jamf Pro API.
 */
readonly class AuthAccountV1 extends Data
{
    /**
     * @param  array<string, mixed>|null  $privilegesBySite
     * @param  list<string>|null  $groupIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $username = null,
        public ?string $realName = null,
        public ?string $email = null,
        public ?AccountPreferencesV1 $preferences = null,
        public ?bool $multiSiteAdmin = null,
        public ?string $accessLevel = null,
        public ?string $privilegeSet = null,
        public ?array $privilegesBySite = null,
        public ?array $groupIds = null,
        public ?string $currentSiteId = null,
        /** Platform division identifier (UUID) for the user's current site */
        public ?string $currentDivisionId = null,
        public array $extra = [],
    ) {}
}
