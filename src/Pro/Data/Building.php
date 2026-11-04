<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Building record from the Jamf Pro API.
 */
readonly class Building extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $streetAddress1 = null,
        public ?string $streetAddress2 = null,
        public ?string $city = null,
        public ?string $stateProvince = null,
        public ?string $zipPostalCode = null,
        public ?string $country = null,
        public array $extra = [],
    ) {}
}
