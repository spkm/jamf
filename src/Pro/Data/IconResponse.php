<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A IconResponse record from the Jamf Pro API.
 */
readonly class IconResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $url = null,
        public ?int $id = null,
        public array $extra = [],
    ) {}
}
