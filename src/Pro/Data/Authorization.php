<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A Authorization record from the Jamf Pro API.
 */
readonly class Authorization extends Data
{
    protected const LISTS = ['accountGroups' => AccountGroup::class, 'sites' => Site::class];

    /**
     * @param  Collection<int, AccountGroup>|null  $accountGroups
     * @param  Collection<int, Site>|null  $sites
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?AuthAccount $account = null,
        public ?Collection $accountGroups = null,
        public ?Collection $sites = null,
        public ?string $authenticationType = null,
        public array $extra = [],
    ) {}
}
