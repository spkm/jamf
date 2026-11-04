<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A InventoryPreloadCsvValidationSuccess record from the Jamf Pro API.
 */
readonly class InventoryPreloadCsvValidationSuccess extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $recordCount = null,
        public array $extra = [],
    ) {}
}
