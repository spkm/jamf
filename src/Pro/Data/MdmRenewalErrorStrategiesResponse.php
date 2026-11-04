<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MdmRenewalErrorStrategiesResponse record from the Jamf Pro API.
 */
readonly class MdmRenewalErrorStrategiesResponse extends Data
{
    protected const LISTS = ['strategies' => MdmRenewalStrategy::class];

    /**
     * @param  Collection<int, MdmRenewalStrategy>|null  $strategies
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?MdmRenewalError $error = null,
        /** List of renewal strategies associated with this error */
        public ?Collection $strategies = null,
        public array $extra = [],
    ) {}
}
