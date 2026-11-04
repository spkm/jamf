<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A AuthorizationV1 record from the Jamf Pro API.
 */
readonly class AuthorizationV1 extends Data
{
    protected const LISTS = ['accountGroups' => AccountGroup::class, 'sites' => V1SiteBase::class];

    /**
     * @param  Collection<int, AccountGroup>|null  $accountGroups
     * @param  Collection<int, V1SiteBase>|null  $sites
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?AuthAccountV1 $account = null,
        public ?Collection $accountGroups = null,
        public ?Collection $sites = null,
        public ?string $authenticationType = null,
        public array $extra = [],
    ) {}
}
