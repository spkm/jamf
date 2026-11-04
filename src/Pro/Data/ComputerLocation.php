<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerLocation record from the Jamf Pro API.
 */
readonly class ComputerLocation extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $position = null,
        public ?string $room = null,
        public array $extra = [],
    ) {}
}
