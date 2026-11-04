<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A TeacherFeatures record from the Jamf Pro API.
 */
readonly class TeacherFeatures extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $isAllowAppLock = null,
        public ?bool $isAllowWebLock = null,
        public ?bool $isAllowRestrictions = null,
        public ?bool $isAllowAttentionScreen = null,
        public ?bool $isAllowClearPasscode = null,
        public array $extra = [],
    ) {}
}
