<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Markdown record from the Jamf Pro API.
 */
readonly class Markdown extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $markdown = null,
        public array $extra = [],
    ) {}
}
