<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A VenafiCaRecord record from the Jamf Pro API.
 */
readonly class VenafiCaRecord extends Data
{
    protected const HIDDEN = ['refreshToken'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $proxyAddress = null,
        public ?bool $revocationEnabled = null,
        public ?string $clientId = null,
        public ?string $refreshToken = null,
        public ?bool $refreshTokenConfigured = null,
        public array $extra = [],
    ) {}
}
