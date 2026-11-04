<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Azure Cloud Identity Provider mappings
 */
readonly class AzureMappings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $userId = null,
        public ?string $userName = null,
        public ?string $realName = null,
        public ?string $email = null,
        public ?string $department = null,
        public ?string $building = null,
        public ?string $room = null,
        public ?string $phone = null,
        public ?string $position = null,
        public ?string $groupId = null,
        public ?string $groupName = null,
        public array $extra = [],
    ) {}
}
