<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmartComputerGroupSearch record from the Jamf Pro API.
 */
readonly class SmartComputerGroupSearch extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $siteId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $membershipCount = null,
        public array $extra = [],
    ) {}
}
