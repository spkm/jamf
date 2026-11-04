<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SmtpConnectionSettings record from the Jamf Pro API.
 */
readonly class SmtpConnectionSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $host = null,
        public ?int $port = null,
        public ?string $encryptionType = null,
        public ?int $connectionTimeout = null,
        public array $extra = [],
    ) {}
}
