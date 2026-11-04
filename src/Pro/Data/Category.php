<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Category record from the Jamf Pro API.
 */
readonly class Category extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?int $priority = null,
        public array $extra = [],
    ) {}
}
