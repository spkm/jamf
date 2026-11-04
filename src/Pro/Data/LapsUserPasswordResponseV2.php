<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A LapsUserPasswordResponseV2 record from the Jamf Pro API.
 */
readonly class LapsUserPasswordResponseV2 extends Data
{
    protected const LISTS = ['lapsUserPasswordList' => LapsUserPasswordV2::class];

    /**
     * @param  Collection<int, LapsUserPasswordV2>|null  $lapsUserPasswordList
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $lapsUserPasswordList = null,
        public array $extra = [],
    ) {}
}
