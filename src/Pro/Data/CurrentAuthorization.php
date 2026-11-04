<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A CurrentAuthorization record from the Jamf Pro API.
 */
readonly class CurrentAuthorization extends Data
{
    protected const LISTS = ['sites' => V1SiteBase::class];

    /**
     * @param  Collection<int, V1SiteBase>|null  $sites
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?CurrentAccount $account = null,
        public ?Collection $sites = null,
        public ?string $authenticationType = null,
        public array $extra = [],
    ) {}
}
