<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SiteObject record from the Jamf Pro API.
 */
readonly class SiteObject extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $siteId = null,
        public ?string $objectType = null,
        public ?string $objectId = null,
        public array $extra = [],
    ) {}
}
