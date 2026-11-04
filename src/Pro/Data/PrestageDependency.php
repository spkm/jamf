<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PrestageDependency record from the Jamf Pro API.
 */
readonly class PrestageDependency extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $humanReadableName = null,
        public ?string $hyperlink = null,
        public array $extra = [],
    ) {}
}
