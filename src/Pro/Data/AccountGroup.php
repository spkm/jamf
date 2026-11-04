<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountGroup record from the Jamf Pro API.
 */
readonly class AccountGroup extends Data
{
    /**
     * @param  list<string>|null  $privileges
     * @param  list<int>|null  $memberUserIds
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $accessLevel = null,
        public ?string $privilegeSet = null,
        public ?int $siteId = null,
        public ?array $privileges = null,
        public ?array $memberUserIds = null,
        public array $extra = [],
    ) {}
}
