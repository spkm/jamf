<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LanguageCode record from the Jamf Pro API.
 */
readonly class LanguageCode extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $value = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
