<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * DigiCert Trust Lifecycle Manager response object.
 */
readonly class DigiCertSettingResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $caName = null,
        public ?string $fqdn = null,
        public ?bool $revocationEnabled = null,
        public ?CertificateResponse $clientCert = null,
        public array $extra = [],
    ) {}
}
