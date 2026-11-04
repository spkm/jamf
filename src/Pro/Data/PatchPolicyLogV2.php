<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyLogV2 record from the Jamf Pro API.
 */
readonly class PatchPolicyLogV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $patchPolicyId = null,
        public ?string $deviceName = null,
        public ?string $deviceId = null,
        public ?int $statusCode = null,
        public ?CarbonImmutable $statusDate = null,
        public ?string $statusEnum = null,
        public ?int $attemptNumber = null,
        public ?string $ignoredForPatchPolicyId = null,
        public array $extra = [],
    ) {}
}
