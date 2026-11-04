<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A EnrollmentCustomizationPanelList record from the Jamf Pro API.
 */
readonly class EnrollmentCustomizationPanelList extends Data
{
    protected const LISTS = ['panels' => GetEnrollmentCustomizationPanel::class];

    /**
     * @param  Collection<int, GetEnrollmentCustomizationPanel>|null  $panels
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $panels = null,
        public array $extra = [],
    ) {}
}
