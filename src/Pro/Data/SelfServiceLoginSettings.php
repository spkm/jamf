<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * object representation of Self Service settings regarding login
 */
readonly class SelfServiceLoginSettings extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** login setting to tell clients how to let users log in */
        public ?string $userLoginLevel = null,
        /** true if remember me functionality is allowed, false if not */
        public ?bool $allowRememberMe = null,
        /** true if use FIDO2 functionality is allowed, false if not */
        public ?bool $useFido2 = null,
        /** login type to be used when asking users to log in */
        public ?string $authType = null,
        public array $extra = [],
    ) {}
}
