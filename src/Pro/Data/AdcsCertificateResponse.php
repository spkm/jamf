<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A AdcsCertificateResponse record from the Jamf Pro API.
 */
readonly class AdcsCertificateResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Server certificate filename should extend .cer or .pem, and client certificate filename should extend .p12 or .pfx. */
        public ?string $filename = null,
        public ?string $serialNumber = null,
        public ?string $subject = null,
        public ?string $issuer = null,
        public ?CarbonImmutable $expirationDate = null,
        public array $extra = [],
    ) {}
}
