<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * Response with keystore information
 */
readonly class CloudLdapKeystore extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $type = null,
        public ?CarbonImmutable $expirationDate = null,
        public ?string $subject = null,
        public ?string $fileName = null,
        public array $extra = [],
    ) {}
}
