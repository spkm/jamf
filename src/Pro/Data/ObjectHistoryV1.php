<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ObjectHistoryV1 record from the Jamf Pro API.
 */
readonly class ObjectHistoryV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $username = null,
        public ?string $date = null,
        public ?string $note = null,
        public ?string $details = null,
        public array $extra = [],
    ) {}
}
