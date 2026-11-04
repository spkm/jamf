<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A StatusItem record from the Jamf Pro API.
 */
readonly class StatusItem extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** The StatusItem key */
        public ?string $key = null,
        /** The StatusItem value */
        public ?string $value = null,
        /** The local server time when the StatusItem was last updated */
        public ?string $lastUpdateTime = null,
        public array $extra = [],
    ) {}
}
