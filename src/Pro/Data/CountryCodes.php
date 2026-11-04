<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A CountryCodes record from the Jamf Pro API.
 */
readonly class CountryCodes extends Data
{
    protected const LISTS = ['countryCodes' => Country::class];

    /**
     * @param  Collection<int, Country>|null  $countryCodes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $countryCodes = null,
        public array $extra = [],
    ) {}
}
