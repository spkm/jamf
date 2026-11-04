<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GsxConnection record from the Jamf Pro API.
 */
readonly class GsxConnection extends Data
{
    protected const HIDDEN = ['token'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $enabled = null,
        public ?string $username = null,
        public ?string $serviceAccountNo = null,
        public ?string $shipToNo = null,
        public ?string $token = null,
        public ?GsxKeystore $gsxKeystore = null,
        public array $extra = [],
    ) {}
}
