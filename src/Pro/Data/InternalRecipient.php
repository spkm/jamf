<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A InternalRecipient record from the Jamf Pro API.
 */
readonly class InternalRecipient extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $accountId = null,
        public ?string $frequency = null,
        public array $extra = [],
    ) {}
}
