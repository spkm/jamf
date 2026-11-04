<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A StatusItems record from the Jamf Pro API.
 */
readonly class StatusItems extends Data
{
    protected const LISTS = ['statusItems' => StatusItem::class];

    /**
     * @param  Collection<int, StatusItem>|null  $statusItems
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $statusItems = null,
        public array $extra = [],
    ) {}
}
