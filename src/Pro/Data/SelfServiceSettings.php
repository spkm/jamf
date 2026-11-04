<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * object representation of Self Service settings
 */
readonly class SelfServiceSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** object representation of Self Service settings regarding installation */
        public ?SelfServiceInstallSettings $installSettings = null,
        /** object representation of Self Service settings regarding login */
        public ?SelfServiceLoginSettings $loginSettings = null,
        /** object representation of Self Service settings regarding user interaction */
        public ?SelfServiceInteractionSettings $configurationSettings = null,
        public array $extra = [],
    ) {}
}
