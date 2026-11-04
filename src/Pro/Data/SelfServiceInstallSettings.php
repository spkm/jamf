<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * object representation of Self Service settings regarding installation
 */
readonly class SelfServiceInstallSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** true if Self Service is installed automatically, false if not */
        public ?bool $installAutomatically = null,
        /** path at which Self Service is installed. Required if installAutomatically is true */
        public ?string $installLocation = null,
        public array $extra = [],
    ) {}
}
