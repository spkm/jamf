<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CertificateKey record from the Jamf Pro API.
 */
readonly class CertificateKey extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?bool $valid = null,
        public array $extra = [],
    ) {}
}
