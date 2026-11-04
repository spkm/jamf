<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyLogDetailAction record from the Jamf Pro API.
 */
readonly class PatchPolicyLogDetailAction extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?int $actionOrder = null,
        public ?string $action = null,
        public array $extra = [],
    ) {}
}
