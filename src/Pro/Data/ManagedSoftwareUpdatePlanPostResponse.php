<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdatePlanPostResponse record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdatePlanPostResponse extends Data
{
    protected const LISTS = ['plans' => PlanDeviceResponse::class];

    /**
     * @param  Collection<int, PlanDeviceResponse>|null  $plans
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $plans = null,
        public array $extra = [],
    ) {}
}
