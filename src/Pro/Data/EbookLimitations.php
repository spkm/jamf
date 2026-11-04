<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EbookLimitations record from the Jamf Pro API.
 */
readonly class EbookLimitations extends Data
{
    /**
     * @param  list<string>|null  $networkSegments
     * @param  array<mixed>|null  $users
     * @param  list<string>|null  $userGroups
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $networkSegments = null,
        public ?array $users = null,
        public ?array $userGroups = null,
        public array $extra = [],
    ) {}
}
