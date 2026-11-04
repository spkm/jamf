<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ActiveUsersCount record from the Jamf Pro API.
 */
readonly class ActiveUsersCount extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Number of currently logged in users */
        public ?int $activeUserCount = null,
        public array $extra = [],
    ) {}
}
