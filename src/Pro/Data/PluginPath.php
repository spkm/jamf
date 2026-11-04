<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PluginPath record from the Jamf Pro API.
 */
readonly class PluginPath extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** A "-1" id indicates a built-in path that cannot be deleted or modified. */
        public ?string $id = null,
        public ?string $path = null,
        public array $extra = [],
    ) {}
}
