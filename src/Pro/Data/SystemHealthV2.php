<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * System health status for device components. Reported for iOS devices.
 */
readonly class SystemHealthV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $baseband = null,
        public ?string $camera = null,
        public ?string $display = null,
        public ?string $faceId = null,
        public ?string $touchId = null,
        public ?string $nfc = null,
        public ?string $ultraWideband = null,
        public array $extra = [],
    ) {}
}
