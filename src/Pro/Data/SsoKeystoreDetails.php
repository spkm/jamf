<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SsoKeystoreDetails record from the Jamf Pro API.
 */
readonly class SsoKeystoreDetails extends Data
{
    /**
     * @param  list<string>|null  $keys
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $keys = null,
        public ?int $serialNumber = null,
        public ?string $subject = null,
        public ?string $issuer = null,
        public ?string $expiration = null,
        public array $extra = [],
    ) {}
}
