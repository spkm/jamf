<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerFont record from the Jamf Pro API.
 */
readonly class ComputerFont extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $version = null,
        public ?string $path = null,
        public array $extra = [],
    ) {}
}
