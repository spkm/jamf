<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A UserTestSearch record from the Jamf Pro API.
 */
readonly class UserTestSearch extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $distinguishedName = null,
        public ?string $id = null,
        public ?string $uuid = null,
        public ?string $serverId = null,
        public ?string $name = null,
        public ?UserTestAttributes $attributes = null,
        public array $extra = [],
    ) {}
}
