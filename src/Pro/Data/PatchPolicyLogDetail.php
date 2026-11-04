<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A PatchPolicyLogDetail record from the Jamf Pro API.
 */
readonly class PatchPolicyLogDetail extends Data
{
    protected const LISTS = ['actions' => PatchPolicyLogDetailAction::class];

    /**
     * @param  Collection<int, PatchPolicyLogDetailAction>|null  $actions
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?int $attemptNumber = null,
        public ?string $deviceId = null,
        public ?Collection $actions = null,
        public array $extra = [],
    ) {}
}
