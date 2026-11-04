<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DssDeclaration record from the Jamf Pro API.
 */
readonly class DssDeclaration extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uuid = null,
        public ?string $payloadJson = null,
        public ?string $type = null,
        public ?string $group = null,
        public array $extra = [],
    ) {}
}
