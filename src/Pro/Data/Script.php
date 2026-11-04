<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Script record from the Jamf Pro API.
 */
readonly class Script extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $info = null,
        public ?string $notes = null,
        public ?string $priority = null,
        public ?string $categoryId = null,
        public ?string $categoryName = null,
        public ?string $parameter4 = null,
        public ?string $parameter5 = null,
        public ?string $parameter6 = null,
        public ?string $parameter7 = null,
        public ?string $parameter8 = null,
        public ?string $parameter9 = null,
        public ?string $parameter10 = null,
        public ?string $parameter11 = null,
        public ?string $osRequirements = null,
        public ?string $scriptContents = null,
        public array $extra = [],
    ) {}
}
