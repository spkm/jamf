<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A LapsPasswordAndAuditsV2 record from the Jamf Pro API.
 */
readonly class LapsPasswordAndAuditsV2 extends Data
{
    protected const LISTS = ['audits' => LapsAuditV2::class];

    protected const HIDDEN = ['password'];

    /**
     * @param  Collection<int, LapsAuditV2>|null  $audits
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $password = null,
        public ?CarbonImmutable $dateLastSeen = null,
        public ?CarbonImmutable $expirationTime = null,
        public ?Collection $audits = null,
        public array $extra = [],
    ) {}
}
