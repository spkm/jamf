<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A OnboardingConfiguration record from the Jamf Pro API.
 */
readonly class OnboardingConfiguration extends Data
{
    protected const LISTS = ['onboardingItems' => OnboardingItem::class];

    /**
     * @param  Collection<int, OnboardingItem>|null  $onboardingItems
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?bool $enabled = null,
        public ?Collection $onboardingItems = null,
        public array $extra = [],
    ) {}
}
