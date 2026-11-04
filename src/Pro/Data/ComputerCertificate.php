<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ComputerCertificate record from the Jamf Pro API.
 */
readonly class ComputerCertificate extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $commonName = null,
        public ?bool $identity = null,
        public ?CarbonImmutable $expirationDate = null,
        public ?string $username = null,
        public ?string $lifecycleStatus = null,
        public ?string $certificateStatus = null,
        public ?string $subjectName = null,
        public ?string $serialNumber = null,
        public ?string $sha1Fingerprint = null,
        public ?string $issuedDate = null,
        public array $extra = [],
    ) {}
}
