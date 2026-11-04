<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CertificateRecord record from the Jamf Pro API.
 */
readonly class CertificateRecord extends Data
{
    /**
     * @param  list<string>|null  $keyUsage
     * @param  list<string>|null  $keyUsageExtended
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $subjectX500Principal = null,
        public ?string $issuerX500Principal = null,
        public ?string $serialNumber = null,
        public ?int $version = null,
        public ?int $notAfter = null,
        public ?int $notBefore = null,
        public ?Signature $signature = null,
        public ?array $keyUsage = null,
        public ?array $keyUsageExtended = null,
        public ?string $sha1Fingerprint = null,
        public ?string $sha256Fingerprint = null,
        public array $extra = [],
    ) {}
}
