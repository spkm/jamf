<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CertificateDetails record from the Jamf Pro API.
 */
readonly class CertificateDetails extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $subject = null,
        public ?string $serialNumber = null,
        public array $extra = [],
    ) {}
}
