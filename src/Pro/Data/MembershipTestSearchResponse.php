<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MembershipTestSearchResponse record from the Jamf Pro API.
 */
readonly class MembershipTestSearchResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?bool $isMember = null,
        public ?bool $isMemberByUuid = null,
        public array $extra = [],
    ) {}
}
