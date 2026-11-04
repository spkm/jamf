<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MobileDeviceCertificate record from the Jamf Pro API.
 */
readonly class MobileDeviceCertificate extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $commonName = null,
        public ?bool $identity = null,
        public ?CarbonImmutable $expirationDate = null,
        public array $extra = [],
    ) {}
}
