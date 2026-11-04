<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SupervisionIdentity record from the Jamf Pro API.
 */
readonly class SupervisionIdentity extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $displayName = null,
        public ?string $commonName = null,
        public ?string $expirationDate = null,
        public array $extra = [],
    ) {}
}
