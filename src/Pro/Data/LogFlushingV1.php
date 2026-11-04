<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A LogFlushingV1 record from the Jamf Pro API.
 */
readonly class LogFlushingV1 extends Data
{
    protected const LISTS = ['retentionPolicies' => RetentionPolicyV1::class];

    /**
     * @param  Collection<int, RetentionPolicyV1>|null  $retentionPolicies
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $retentionPolicies = null,
        public ?int $hourOfDay = null,
        public array $extra = [],
    ) {}
}
