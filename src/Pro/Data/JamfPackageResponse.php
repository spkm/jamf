<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A JamfPackageResponse record from the Jamf Pro API.
 */
readonly class JamfPackageResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $filename = null,
        public ?string $version = null,
        public ?string $created = null,
        public ?string $url = null,
        public array $extra = [],
    ) {}
}
