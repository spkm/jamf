<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerPrinter record from the Jamf Pro API.
 */
readonly class ComputerPrinter extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $type = null,
        public ?string $uri = null,
        public ?string $location = null,
        public array $extra = [],
    ) {}
}
