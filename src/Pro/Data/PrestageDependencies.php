<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A PrestageDependencies record from the Jamf Pro API.
 */
readonly class PrestageDependencies extends Data
{
    protected const LISTS = ['dependencies' => PrestageDependency::class];

    /**
     * @param  Collection<int, PrestageDependency>|null  $dependencies
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $dependencies = null,
        public array $extra = [],
    ) {}
}
