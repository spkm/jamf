<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GroupDtoV1 record from the Jamf Pro API.
 */
readonly class GroupDtoV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $groupPlatformId = null,
        public ?string $groupJamfProId = null,
        public ?string $groupName = null,
        public ?string $groupDescription = null,
        public ?string $groupType = null,
        public ?bool $smart = null,
        public ?int $membershipCount = null,
        public array $extra = [],
    ) {}
}
