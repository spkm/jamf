<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Reenrollment record from the Jamf Pro API.
 */
readonly class Reenrollment extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $isFlushPolicyHistoryEnabled = null,
        public ?bool $isFlushLocationInformationEnabled = null,
        public ?bool $isFlushLocationInformationHistoryEnabled = null,
        public ?bool $isFlushExtensionAttributesEnabled = null,
        public ?bool $isFlushSoftwareUpdatePlansEnabled = null,
        public ?string $flushMDMQueue = null,
        public array $extra = [],
    ) {}
}
