<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ObjectHistory record from the Jamf Pro API.
 */
readonly class ObjectHistory extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $username = null,
        public ?string $date = null,
        public ?string $note = null,
        public ?string $details = null,
        public array $extra = [],
    ) {}
}
