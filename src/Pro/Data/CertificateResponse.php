<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A CertificateResponse record from the Jamf Pro API.
 */
readonly class CertificateResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Client certificate filename with .p12 extension. */
        public ?string $filename = null,
        public ?string $serialNumber = null,
        public ?string $subject = null,
        public ?string $issuer = null,
        public ?CarbonImmutable $expirationDate = null,
        public array $extra = [],
    ) {}
}
