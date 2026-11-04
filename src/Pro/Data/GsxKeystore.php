<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GsxKeystore record from the Jamf Pro API.
 */
readonly class GsxKeystore extends Data
{
    protected const HIDDEN = ['keystorePassword'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?int $expirationEpoch = null,
        public ?string $errorMessage = null,
        /** The base 64 encoded of the GSX Connection keystore. */
        public ?string $keystoreBytes = null,
        public ?string $keystorePassword = null,
        public array $extra = [],
    ) {}
}
